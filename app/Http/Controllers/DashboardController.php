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
        
        // $postOrder = session('post_order', Post::pluck('id')->shuffle()->toArray());

        // // Store the order in the session
        // session(['post_order' => $postOrder]);
    
        // // Fetch posts in the randomized order
        // $post = Post::whereIn('id', $postOrder)
        //              ->orderByRaw("FIELD(id, " . implode(',', $postOrder) . ")")
        //              ->get();
            // Fetch all post IDs and shuffle them
    // $postOrder = Post::pluck('id')->shuffle()->toArray();

    // // Fetch posts in the shuffled order
    // $post = Post::whereIn('id', $postOrder)
    //              ->orderByRaw("FIELD(id, " . implode(',', $postOrder) . ")")
    //              ->get();
    
        return view('dashboard.index', ['posts' => $post]);
    }
}
