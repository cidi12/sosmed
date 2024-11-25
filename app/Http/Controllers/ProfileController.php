<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // public function index() {
    //     $username = Auth::guard('member')->user()->username;
    //     $email = Auth::guard('member')->user()->email;
    //     $post = Post::select('id', 'username', 'post_title', 'post_content', 'post_commenter', 'post_comment', 'total_comment', 'likes', 'dislikes', 'shares')->where('email', $email)->orderBy('created_at','desc')->get();
    //     $currentDateTime = now()->toDateString();
    //     $likebtn = Interaction::select('post_id', 'commenter', 'likes', 'dislikes', 'shares')->where('commenter', $username)->get();
    //     return view('dashboard.profile',['posts'=>$post,'likes'=>$likebtn]);
    // }
}
