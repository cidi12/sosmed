<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Interaction;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $username = Auth::guard('member')->user()->username;
        $email = Auth::guard('member')->user()->email;
        $post = Post::select('id', 'username', 'post_title', 'post_content', 'post_commenter', 'post_comment', 'total_comment', 'likes', 'dislikes', 'shares')->where('email', $email)->orderBy('created_at', 'desc')->get();
        $currentDateTime = now()->toDateString();
        $likebtn = Interaction::select('post_id', 'commenter', 'likes', 'dislikes', 'shares')->where('commenter', $username)->get();
        return view('dashboard.profile', ['posts' => $post, 'likes' => $likebtn]);
    }
    public function viewpost(Request $request, $id)
    {
        $username = Auth::guard('member')->user()->username;

        $post_id = $id;
        // dd($post_id);
        $check = Post::select('id', 'user_id', 'username', 'post_title', 'post_content', 'post_commenter', 'post_comment', 'total_comment', 'likes', 'dislikes', 'shares')->where('id', $post_id);
        $post = Post::select('id', 'user_id', 'username', 'post_title', 'post_content', 'post_commenter', 'post_comment', 'total_comment', 'likes', 'dislikes', 'shares')->where('id', $post_id)->first();
        $comments = Comment::select('id', 'post_id', 'user_id', 'commenter', 'comment')->where('post_id', $post_id)->orderBy('created_at', 'DESC')->limit(5)->get();
        $likebtn = Interaction::select('post_id', 'commenter', 'likes', 'dislikes', 'shares')->where('commenter', $username)->get();
        if ($check->exists()) {
            return view('dashboard.viewpost', ['posts' => $post, 'likes' => $likebtn, 'comments' => $comments]);
        } else {
            return redirect('dashboard.index');
        }
    }
    public function viewprofile(Request $request, $id)
    {
        $username = Auth::guard('member')->user()->username;
        $email = Auth::guard('member')->user()->email;
        $post_id = $id;
        // dd($post_id);
        $check = Post::select('id', 'username', 'user_id')->where('user_id', $post_id);
        $post = Post::select('id', 'user_id', 'username', 'post_title', 'post_content', 'post_commenter', 'post_comment', 'total_comment', 'likes', 'dislikes', 'shares')->where('user_id', $post_id)->get();
        $profile = Post::select('id', 'username', 'user_id')->where('user_id', $post_id)->first();
        $likebtn = Interaction::select('post_id', 'commenter', 'likes', 'dislikes', 'shares')->where('commenter', $username)->get();
        $friendcount = Profile::select('id', 'user_id', 'friend')->where('user_id', $post_id)->where('friend', 'true')->count();
        $friendlist = Profile::select('id', 'user_id', 'friend', 'email')->where('user_id', $post_id)->where('email', $email)->first();
        if ($check->exists()) {
            return view('dashboard.viewprofile', ['posts' => $post, 'likes' => $likebtn, 'profile' => $profile, 'friendlist' => $friendcount, 'friendstatus' => $friendlist]);
        } else {
            return redirect('dashboard.index');
        }
    }
}
