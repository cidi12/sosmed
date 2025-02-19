<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $post_id = $id;
        $user_id = Auth::guard('member')->user()->id;
        $username = Auth::guard('member')->user()->username;
        $email = Auth::guard('member')->user()->email;

        if ($request->header('HX-Request')) {
            $validator = Validator::make($request->all(), [
                'comment' => 'required|string',
            ]);
            if ($validator->fails()) {
                $post = Post::where('id', $post_id)->get();
                $likebtn = Interaction::where('email', $email)->get();
                return response(view('partials.comment', ['posts' => $post,'likes'=>$likebtn]));
            }
            $validate = $request->validate(
                [
                    'comment' => 'required|string',
                ]
            );
            $comment = $validate['comment'];
            Comment::create(
                [
                    'commenter' => $username,
                    'user_id'=>$user_id,
                    'comment' => $comment,
                    'post_id' => $post_id,
                    'email'=>$email,
                ]
            );
            $total_comment = Comment::where('post_id', $post_id)->count();
            $currentDate = now()->toDateString();
            Post::where('id', $post_id)->update(['total_comment' => $total_comment, 'post_comment' => $comment, 'post_commenter' => $username, 'updated_at' => $currentDate, 'merit' => DB::raw('(likes*1.5) + (total_comment*1)')]);
            $post = Post::where('id', $post_id)->get();
            $likebtn = Interaction::where('email', $email)->get();
            return view('partials.comment', ['posts' => $post, 'likes' => $likebtn]);;
        }
    } 
    public function postcomment(Request $request, $id)
    {
        $post_id = $id;
        $user_id = Auth::guard('member')->user()->id;
        $username = Auth::guard('member')->user()->username;
        $email = Auth::guard('member')->user()->email;

        if ($request->header('HX-Request')) {
            $validator = Validator::make($request->all(), [
                'comment' => 'required|string',
            ]);
            if ($validator->fails()) {
                $post = Post::where('id', $post_id)->first();
                $likebtn = Interaction::where('email', $email)->get();
                $comments = Comment::select('id','user_id','post_id', 'commenter','comment')->where('post_id',$post_id)->orderBy('created_at', 'DESC')->limit(5)->get();
                return response(view('partials.postcomments', ['posts' => $post,'comments'=>$comments,'likes'=>$likebtn]));
            }
            $validate = $request->validate(
                [
                    'comment' => 'required|string',
                ]
            );
            $comment = $validate['comment'];
            Comment::create(
                [
                    'commenter' => $username,
                    'comment' => $comment,
                    'user_id'=>$user_id,
                    'post_id' => $post_id,
                    'email'=>$email,
                ]
            );
            $total_comment = Comment::where('post_id', $post_id)->count();
            $currentDate = now()->toDateString();
            Post::where('id', $post_id)->update(['total_comment' => $total_comment, 'post_comment' => $comment, 'post_commenter' => $username, 'updated_at' => $currentDate, 'merit' => DB::raw('(likes*1.5) + (total_comment*1)')]);
            $post = Post::where('id', $post_id)->first();
            $likebtn = Interaction::where('email', $email)->get();
            $comments = Comment::select('id','user_id','post_id', 'commenter','comment')->where('post_id',$post_id)->orderBy('created_at', 'DESC')->limit(5)->get();
            return view('partials.postcomments', ['posts' => $post,'comments'=>$comments, 'likes' => $likebtn]);;
        }
    }
}
