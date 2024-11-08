<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Credential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CredentialController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function signUpPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate(
            [
                'regist-email' => 'required|string',
                'regist-username' => 'required|string',
                'regist-password' => 'required|string'
            ]
        );
        $email = $validated['regist-email'];
        $username = $validated['regist-username'];
        $password = $validated['regist-password'];
        $hash = Hash::make($password);
        $checkExistEmail = Credential::where('email', $email)->first();
        if ($checkExistEmail) {
            return view('partials.signup')->with('regErr', 'Username sudah terdaftar!');
        } else {
            Credential::create(
                [
                    'email' => $email,
                    'username' => $username,
                    'password' => $hash
                ]
            );
            return view('index')->with('regSucc', 'User berhasil ditambahkan!');
        }
    }
    public function login(Request $request)
    {
        $validated = $request->validate(
            [
                'login_email' => 'required|string',
                'login_password' => 'required|string'
            ]
        );

        $credentials = ['email' => $validated['login_email'], 'password' => $validated['login_password']];

        if (Auth::guard('member')->attempt($credentials)) {
           $request->session()->regenerate();
          $user = Auth::guard('member')->user()->email;
          $test = Credential::where('email', $user)->first();
            // dd($test->id);
            // Auth::guard('member')->login($test);
            Auth::guard('member')->loginUsingId($test->email);
            return redirect('dashboard')->with('logSuccess', 'Login Sukses');
        } else {
           
            return redirect('/')->with('logFail', 'Email atau Password salah');
        }
    }
    public function logout(Request $request)
    {
        
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}
