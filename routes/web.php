<?php

use App\Http\Controllers\PaperController;
use App\Http\Middleware\GetToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Models\GradeClass;
use App\Models\register;
use App\Models\Subject;
use App\Models\Subject_Grade;
use App\Models\SubjectGrades;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

// Route::get("/pivot" , function(){
//     $grade = GradeClass::find(1);
//     $grade->subject()->attach(2);
//     dd($grade->subject);
// });



Route::get("/add/subjects" , function(){
    $subjects = Subject::all();
    $grades = GradeClass::all();
   return view('papers.add-subject-grade' , compact('subjects' , 'grades'));
});

Route::post("/add/subjects" , function(Request $request){
    $subject = Subject::find($request->subject);
    $subject->grade()->attach($request->grade);
    return redirect()->back();
});

Route::get('/', function () {
    $subjects = Subject::all();
    $grades = GradeClass::all();
    return view('index' , compact('subjects' , 'grades'));
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

Route::get('/customers', function () {
    return view('admins.customers');
});
Route::get('/category', function () {
    return view('admins.category');
});
Route::get('/products', function () {
    return view('admins.products');
});
Route::get('/orders', function () {
    return view('admins.orders');
});

Route::get("/grade/subjects/{id}" , function($id){

    $subjects = DB::table('subject_grades')
    ->join('subjects', 'subjects.id', '=', 'subject_grades.subjectId')
    ->join('grade_classes', 'grade_classes.id', '=', 'subject_grades.gradeId')
    ->where('subject_grades.gradeId' , '=' , $id)
    ->select('subject_grades.*', 'subjects.name')
    ->get();
    // dd($subjects);
    // $grade = GradeClass::find($id);
    // $subjects = $grade->subject;
    // dd($subjects);
    return view('papers.subjects', compact('subjects'));
});
// i tried adding this as a route , didnt manage, check on how we can manage to add the dashboard
// Route::get('/upload-papers', function () {
//     return view('livewire.upload-papers');
// });

