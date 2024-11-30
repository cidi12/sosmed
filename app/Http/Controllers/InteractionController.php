<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Interaction;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InteractionController extends Controller
{
    public function like($id)
    {
        $post_id =  $id;
        $username = Auth::guard('member')->user()->username;
        $email = Auth::guard('member')->user()->email;
        $record = Interaction::where('email', $email)->where('post_id', $post_id);
        $currentDate = now()->toDateString();
        if ($record->exists()) {
            if ($record->where('likes', 'false')->exists()) {
                Interaction::where('post_id', $post_id)->where('likes', 'false')->where('commenter', $username)->update(['updated_at' => $currentDate, 'likes' => 'true']);
            } else if ($record->where('likes', 'true')) {
                Interaction::where('post_id', $post_id)->where('likes', 'true')->where('commenter', $username)->update(['updated_at' => $currentDate, 'likes' => 'false']);
            }
            $total_likes = Interaction::where('post_id', $post_id)->where('likes', 'true')->count();
            Post::where('id', $post_id)->update(['updated_at' => $currentDate, 'likes' => $total_likes, 'merit' => DB::raw('(likes*1.5) + (total_comment*1)')]);
            $post = Post::where('id', $post_id)->get();
            $likebtn = Interaction::where('email', $email)->where('post_id', $post_id)->first();
            return view('partials.interaction', ['posts' => $post, 'like' => $likebtn]);
        } else {
            Interaction::create(
                [
                    'commenter' => $username,
                    'post_id' => $post_id,
                    'email' => $email,
                    'likes' => 'true',
                    'dislikes' => 'false'
                ]
            );
            $total_likes = Interaction::where('post_id', $post_id)->where('likes', 'true')->count();
            Post::where('id', $post_id)->update(['updated_at' => $currentDate, 'likes' => $total_likes, 'merit' => DB::raw('(likes*1.5) + (total_comment*1)')]);
            $likebtn = Interaction::where('email', $email)->where('post_id', $post_id)->first();
            $post = Post::where('id', $post_id)->get();

            return view('partials.interaction', ['posts' => $post, 'like' => $likebtn]);
        }
    }
    public function dislike($id)
    {
        $post_id =  $id;
        $username = Auth::guard('member')->user()->username;
        $currentDate = now()->toDateString();
        $email = Auth::guard('member')->user()->email;
        $record = Interaction::where('email', $email)->where('post_id', $post_id);
        if ($record->exists()) {
            if ($record->where('dislikes', 'false')->exists()) {
                Interaction::where('post_id', $post_id)->where('dislikes', 'false')->where('commenter', $username)->update(['dislikes' => 'true']);
            } else if ($record->where('dislikes', 'true')) {
                Interaction::where('post_id', $post_id)->where('dislikes', 'true')->where('commenter', $username)->update(['dislikes' => 'false']);
            }
            $total_dislikes = Interaction::where('post_id', $post_id)->where('dislikes', 'true')->count();
            Post::where('id', $post_id)->update(['dislikes' => $total_dislikes]);
            $post = Post::where('id', $post_id)->get();
            $dislikebtn = Interaction::where('email', $email)->where('post_id', $post_id)->first();
            return view('partials.interaction', ['posts' => $post, 'like' => $dislikebtn]);
        } else {
            Interaction::create(
                [
                    'commenter' => $username,
                    'post_id' => $post_id,
                    'email' => $email,
                    'dislikes' => 'true',
                    'likes' => 'false'
                ]
            );
            $total_dislikes = Interaction::where('post_id', $post_id)->where('dislikes', 'true')->count();
            Post::where('id', $post_id)->update(['dislikes' => $total_dislikes]);
            $post = Post::where('id', $post_id)->get();
            $dislikebtn = Interaction::where('email', $email)->where('post_id', $post_id)->first();
            return view('partials.interaction', ['posts' => $post, 'like' => $dislikebtn]);
        }
    }
    public function addFriend(Request $request, $id)
    {
        $user_id = $id;
        $username = Auth::guard('member')->user()->username;
        $email = Auth::guard('member')->user()->email;
        $record = Profile::where('user_id', $user_id)->where('username', $username)->where('email', $email);
        if ($record->exists()) {
            if ($record->where('friend', 'true')->exists()) {
                Profile::where('user_id', $user_id)->where('username', $username)->where('email', $email)->update(['friend' => 'false']);
                
            } else if ($record->where('friend', 'false')) {
                Profile::where('user_id', $user_id)->where('username', $username)->where('email', $email)->update(['friend' => 'true']);
             
            }
            return redirect('viewprofile/' . $user_id);
        } else {
            Profile::create(
                [
                    'username' => $username,
                    'user_id' => $user_id,
                    'email' => $email,
                    'friend' => 'true'
                ]
            );
        }
        return redirect('viewprofile/' . $user_id);
    }
}
