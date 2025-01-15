<?php

namespace App\Http\Controllers;

use App\Mail\SendPaper;
use App\Models\PastPapers;
use App\Models\Payment;
use App\Models\Transaction;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('payments.details' , ['paperId' => $id , 'paper'=>$paper]);
    }

    public function initiate_payment(Request $request , $id){

        $validatedInput = $request->validate([
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $paper = PastPapers::where('id' , $id)->first();
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
                        "value" => $paper->price
                    ]
                ]
            ]
        ]);
        if(isset($response['id']) && $response['id'] != null){
            foreach($response['links'] as $link){
                if($link["rel"] == 'approve'){
                    session()->put([
                        'email' => $validatedInput['email'],
                        'phone_number' =>  $validatedInput['phone_number'],
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

                    DB::transaction(function () use($paperId , $email , $phone , $u) {

                        try {
                            $transaction = Transaction::create([
                                'paperId' => $paperId,
                                'customer_email' => $email,
                                'customer_phone' => $phone,
                                'amount' => $u['amount']['value']
                            ]);
                        } catch (\Throwable $th) {

                            return redirect("/payments/cancel")->with('transaction_fail' ,"Failed to Save Transaction");
                            //throw $th;
                        }

                        try {
                            $payment = Payment::create([
                                'transactionId' => $transaction->id,
                                'amount' => $transaction->amount
                            ]);
                            $paper = PastPapers::where('id' , $paperId)->first();
                            // $file = Storage::get($paper->paper_url);

                            Mail::to($transaction->customer_email)->send(new SendPaper($paper->paper_url , $transaction->reference_code));
                        } catch (\Throwable $th) {

                            return redirect("/payments/cancel")->with('payment_fail' ,"Failed to Save Payment");
                            //throw $th;
                        }

                    });

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
