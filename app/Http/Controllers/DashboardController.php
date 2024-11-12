<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Post::inRandomOrder()->get();
        $comment = DB::table('comments')
        ->join('posts', 'comments.post_id', '=', 'posts.id')
        ->select('comments.*', 'posts.id')
        ->get();
        return view('dashboard.index', ['posts' => $comment, 'comments' => $post]);
    }
}
