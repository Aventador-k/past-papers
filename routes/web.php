<?php

use App\Http\Controllers\PaperController;
use App\Http\Middleware\GetToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Models\register;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get("/auth/login" , function(){
    return view("login");
});


Route::get("/stk" , function(){
    return view("pay");
});

Route::post("/pay" , function(Request $request){
    // {
    //     "BusinessShortCode": "174379",
    //     "Password": "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMTYwMjE2MTY1NjI3",
    //     "Timestamp":"20160216165627",
    //     "TransactionType": "CustomerPayBillOnline",
    //     "Amount": "1",
    //     "PartyA":"254708374149",
    //     "PartyB":"174379",
    //     "PhoneNumber":"254708374149",
    //     "CallBackURL": "https://mydomain.com/pat",
    //     "AccountReference":"Test",
    //     "TransactionDesc":"Test"
    //  }
    $token = $request->request->get('token');
    $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $short_code = "174379";
    $timestamp = Carbon::now()->format("YmdHis");
    $password = base64_encode($short_code . $passkey . $timestamp);
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $token
    ])->post("https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest" , [
        "BusinessShortCode" => "174379",
        "Password" => $password,
        "Timestamp" => $timestamp,
        "TransactionType" => "CustomerPayBillOnline",
        "Amount" => "1",
        "PartyA" => "254758262427",
        "PartyB" => "174379",
        "PhoneNumber" =>"254758262427",
        "CallBackURL" => "https://tasty-walls-remain.loca.lt/callback",
        "AccountReference" => "Test",
        "TransactionDesc" => "Test"
    ]);


})->middleware(GetToken::class);

Route::controller(PaperController::class)->group(function(){
    Route::prefix("papers")->group(function(){
        Route::get("" , "index");
        Route::get("new" , "create");
    });
});

Route::controller(PaymentController::class)->group(function(){
    Route::prefix("payments")->group(function(){
        Route::get("details/{id}" , "render_details_form");
        Route::post("pay/{id}" , "initiate_payment");
        Route::get("success" , "success_pay")->name('paypal_success');
        Route::get("cancel" , "cancel_pay")->name('paypal_cancel');
    });
});

Route::post("/callback" , function(Request $request){

});

Route::get("/dashboard" , function(){
    return view("dashboard");
});
Route::post('/login', [AuthController::class,'login']);


