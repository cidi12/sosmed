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
        $email = Auth::guard('member')->user()->email;
        // Comment::create(
        //     [   'commenter'=>$username,
        //         'comment' => $comment,
        //         'post_id' => $post_id,
                
        //     ]
        // );
        Post::where('comment', ['email'=>$email])->where('id', $post_id)->update('comment',['text' => $comment]);
        return redirect('dashboard.index');
    }
}
