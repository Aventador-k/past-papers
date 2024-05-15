<?php

namespace App\Http\Controllers;

use App\Mail\SendPaper;
use App\Models\PastPapers;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    //
    public function render_details_form(Request $request , $id){
        $paper = PastPapers::where('id' , $id)->first();
        if(!$paper){
            return view('error_pages.paper-not-found');
        }
        return view('payments.details' , ['paperId' => $id]);
    }

    public function initiate_payment(Request $request , $id){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal_success'),
                "cancel_url" => route('paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "1"
                    ]
                ]
            ]
        ]);
        if(isset($response['id']) && $response['id'] != null){
            foreach($response['links'] as $link){
                if($link["rel"] == 'approve'){
                    session()->put([
                        'email' => $request->email,
                        'phone_number' =>  $request->phone,
                        'paperId' => $id,
                    ]);
                    // $request->request->add(['email' => $request->email]);
                    return redirect()->away($link['href']);
                }
            }
        }else{
            return redirect()->route("paypal_cancel");
        }


    }

    public function success_pay(Request $request){
        $email = session()->get('email');
        $phone = session()->get('phone_number');
        $paperId = session()->get('paperId');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);
        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
            foreach($response["purchase_units"] as $unit){
                foreach($unit['payments']['captures'] as $u){
                    // dd($u['amount']['value']);
                    // dd($paperId);
                    $transaction = Transaction::create([
                        'paperId' => $paperId,
                        'customer_email' => $email,
                        'customer_phone' => $phone,
                        'amount' => $u['amount']['value']
                    ]);
                    $payment = Payment::create([
                        'transactionId' => $transaction->id,
                        'amount' => $transaction->amount
                    ]);
                    $paper = PastPapers::where('id' , $paperId)->first();
                    // $file = Storage::get($paper->paper_url);

                    Mail::to('edwardkabwoy@gmail.com')->send(new SendPaper($paper->paper_url));
                }
            }
        }else {
            return redirect()->route("paypal_cancel");
        }
        return view('payments.success');
    }

    public function cancel_pay(){
        return view('payments.cancel');
    }
}
