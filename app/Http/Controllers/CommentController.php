<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $validate = $request->validate(
            [
                'comment' => 'required|string',
                'post_id' => 'required|string'
            ]
        );
        $comment = $validate['comment'];
        $post_id = $validate['post_id'];
        $username = Auth::guard('member')->user()->username;
       
        Comment::create(
            [   'commenter'=>$username,
                'comment' => $comment,
                'post_id' => $post_id,

            ]
        );
       
        return redirect('dashboard.index');
    }
}
