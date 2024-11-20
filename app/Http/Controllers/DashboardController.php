<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Post::select('id', 'username', 'post_title', 'post_content', 'post_commenter', 'post_comment', 'total_comment', 'likes', 'dislikes', 'shares')->inRandomOrder()->get();
        $trending = Post::select('id', 'post_title')->limit(5)->get();

        $username = Auth::guard('member')->user()->username;

        $likebtn = Interaction::select('post_id', 'commenter', 'likes', 'dislikes', 'shares')->where('commenter', $username)->get();


        // dd($likebtn2);
        return view('dashboard.index', ['posts' => $post, 'likes' => $likebtn, 'trendings'=>$trending]);
    }
}
