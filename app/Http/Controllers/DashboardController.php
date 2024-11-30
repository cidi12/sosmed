<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Interaction;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Post::select('id', 'user_id', 'username', 'post_title', 'post_content', 'post_commenter', 'post_comment', 'total_comment', 'likes', 'dislikes', 'shares')->inRandomOrder()->get();
        $currentDateTime = now()->toDateString();

        $trending = Post::select('id', 'post_title', 'merit')->where('updated_at', $currentDateTime)->limit(5)->get();


        // dd($trending);
        $username = Auth::guard('member')->user()->username;
        $email = Auth::guard('member')->user()->email;
        $user_id = Auth::guard('member')->user()->id;

        $likebtn = Interaction::select('post_id', 'commenter', 'likes', 'dislikes', 'shares')->where('commenter', $username)->get();
        $mygroup = Group::where('user_id', $user_id)->get();
        $checkmygroup = Group::where('user_id', $user_id);
        $checkmyfriend = Profile::where('email', $email);
        $myfriend = Profile::where('email', $email)->where('friend', 'true')->get();
        $results = Profile::join('credentials', 'profiles.user_id', '=', 'credentials.id')
        ->select('profiles.id as post_id',  'credentials.username as name')->where('profiles.email',$email)
        ->get();
        // dd($likebtn2);
        if ($checkmygroup->exists()) {
            if ($checkmyfriend->exists()) {
                return view('dashboard.index', ['posts' => $post, 'likes' => $likebtn, 'trendings' => $trending, 'grouplist' => $mygroup, 'listfriends' => $results]);
            } else {
                return view('dashboard.index', ['posts' => $post, 'likes' => $likebtn, 'trendings' => $trending, 'grouplist' => $mygroup, 'listfriends'=>[]]);
            }
        } else {
            return view('dashboard.index', ['posts' => $post, 'likes' => $likebtn, 'trendings' => $trending, 'grouplist' => []]);
        }
    }
}
