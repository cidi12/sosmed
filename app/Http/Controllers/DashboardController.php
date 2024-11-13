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
        // $post = DB::table('comments')
        // ->join('posts', 'comments.post_id', '=', 'posts.id')
        // ->select('comments.*', 'posts.*')
        // ->get();
        return view('dashboard.index', ['posts' => $post]);
    }
}
