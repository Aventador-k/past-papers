<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthController extends Controller
{
    public function login(Request $request){
       $data = $request-> validate([
            'email' => 'required',
            'password' => 'required|string',
        ]);
        // dd($data);
        $user= User::where('email',$data['email'])->first();
        if (!$user) {
            return redirect('/auth/login')->with('invalid_email' , 'Unknown Email');
        }
         $isvalidpassword=Hash::check($data['password'],$user->password);

        if(!$isvalidpassword){
            return redirect('/auth/login')->with('invalid_password' , 'Incorrect Password');
        }
        Auth::login($user);
        return redirect('/dashboard');
         }
};


