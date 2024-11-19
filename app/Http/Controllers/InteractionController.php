<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteractionController extends Controller
{
    public function like($id)
    {
        $post_id =  $id;
        $username = Auth::guard('member')->user()->username;
        $record = Interaction::where('commenter', $username)->where('post_id', $post_id);
        if ($record->exists()) {
            if ($record->where('likes', 'false')->exists()) {
                Interaction::where('post_id', $post_id)->where('likes', 'false')->update(['likes' => 'true']);
            } else if ($record->where('likes', 'true')) {
                Interaction::where('post_id', $post_id)->where('likes', 'true')->update(['likes' => 'false']);
            }
            $total_likes = Interaction::where('post_id', $post_id)->where('likes', 'true')->count();
            Post::where('id', $post_id)->update(['likes' => $total_likes]);
            $post = Post::where('id', $post_id)->get();
            $likebtn = Interaction::where('commenter', $username)->where('post_id', $post_id)->first();
            $post = Post::where('id', $post_id)->get();
            return view('partials.interaction', ['posts' => $post, 'like' => $likebtn]);
        } else {
            Interaction::create(
                [
                    'commenter' => $username,
                    'post_id' => $post_id,
                    'likes' => 'true',
                    'dislikes' => 'false'
                ]
            );
            $total_likes = Interaction::where('post_id', $post_id)->where('likes', 'true')->count();

            Post::where('id', $post_id)->update(['likes' => $total_likes]);
            $likebtn = Interaction::where('commenter', $username)->where('post_id', $post_id)->first();
            $post = Post::where('id', $post_id)->get();
            return view('partials.interaction', ['posts' => $post, 'like' => $likebtn]);
        }
    }
    public function dislike($id)
    {
        $post_id =  $id;
        $username = Auth::guard('member')->user()->username;
        $username = Auth::guard('member')->user()->username;
        $record = Interaction::where('commenter', $username)->where('post_id', $post_id);
        if ($record->exists()) {
            if ($record->where('dislikes', 'false')->exists()) {
                Interaction::where('post_id', $post_id)->where('dislikes', 'false')->update(['dislikes' => 'true']);
            } else if ($record->where('dislikes', 'true')) {
                Interaction::where('post_id', $post_id)->where('dislikes', 'true')->update(['dislikes' => 'false']);
            }
            $total_dislikes = Interaction::where('post_id', $post_id)->where('dislikes', 'true')->count();
            Post::where('id', $post_id)->update(['dislikes' => $total_dislikes]);
            $post = Post::where('id', $post_id)->get();
            return view('partials.interaction', ['posts' => $post]);
        } else {
            Interaction::create(
                [
                    'commenter' => $username,
                    'post_id' => $post_id,
                    'dislikes' => 'true',
                    'likes' => 'false'
                ]
            );
            $total_dislikes = Interaction::where('post_id', $post_id)->where('dislikes', 'true')->count();

            Post::where('id', $post_id)->update(['dislikes' => $total_dislikes]);

            $post = Post::where('id', $post_id)->get();
            return view('partials.interaction', ['posts' => $post]);
        }
    }
}
