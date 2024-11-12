<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $validate = $request->validate(
            [
                'comment' => 'required|string'
            ]
        );
        $comment = $validate['comment'];
        Comment::insert(
            [
                'comment' => $comment,
                
            ]
        );
        return redirect('dashboard.index');
    }
}
