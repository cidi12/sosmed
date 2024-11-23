<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $validate = $request->validate(
            [
                'comment' => 'required|string',
                // 'post_id' => 'required|string'
            ]
        );
        $comment = $validate['comment'];
        $post_id = $id;
        $username = Auth::guard('member')->user()->username;

        Comment::create(
            [
                'commenter' => $username,
                'comment' => $comment,
                'post_id' => $post_id,

            ]
        );
        $total_comment = Comment::where('post_id', $post_id)->count();
        // dd($total_comment);
        $currentDate = now()->toDateString();
        Post::where('id', $post_id)->update(['total_comment' => $total_comment, 'post_comment' => $comment, 'post_commenter' => $username, 'updated_at'=>$currentDate, 'merit'=> DB::raw('(likes*1.5) + (total_comment*1)')]);

        $post = Post::where('id', $post_id)->get();
        $likebtn = Interaction::select('post_id','commenter','likes','dislikes','shares')->where('commenter', $username)->get();
        
        return view('partials.comment', ['posts' => $post,'likes'=>$likebtn]);
    }
    
}
