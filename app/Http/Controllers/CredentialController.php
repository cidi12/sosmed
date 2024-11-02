<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Credential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CredentialController extends Controller
{
    public function index (){
        return view('index');
    }
    public function signUpPage (){
        return view('register');
    }
    
    public function register(Request $request){
        $validated = $request->validate(
            [
                'regist-email'=>'required|string',
                'regist-password'=>'required|string'
            ]
        );
        $email = $validated['regist-email'];
        $password = $validated['regist-password'];
        $hash = Hash::make($password);
        $checkExistEmail = Credential::where('email',$email)->first(); 
        if ($checkExistEmail){
            return view('partials.signup')->with('regErr', 'Username sudah terdaftar!');
        } else {
            Credential::create([
                'email'=>$email,
                'password'=>$hash
                ]
            );
            return view('index')->with('regSucc', 'User berhasil ditambahkan!');
        }
        

    }
    public function login(Request $request){
        $request->validate(
            [
                'login_email'=>'required|string',
                'login_password'=>'required|string'
            ]
        );
      
        $credentials = ['email' => $request->login_email, 'password' => $request->login_password];
       
        if (Auth::guard('member')->attempt($credentials)) {
      
            
            return redirect('dashboard');
        } else {
         
            return redirect('dashboards');
        }
        }
    
}
