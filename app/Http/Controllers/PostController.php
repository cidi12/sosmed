<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboard.post');
    }

    public function post(Request $request)
    {
        $validated = $request->validate(
            [
                'post-title' => 'required|string',
                'post-content' => 'required|string'
            ]
       
        );
        $email = Auth::guard('member')->user()->email;
        $username = Auth::guard('member')->user()->username;
        $user = Credential::where('email', $email)->first();
       
        // $user->user()
        Post::create(
            [
                'post_title' => $validated['post-title'],
                'post_content' => $validated['post-content'],
                'username' => $username,
                'email' => $email
                
            ]
        );
        return redirect('dashboard.index');
    }
}
