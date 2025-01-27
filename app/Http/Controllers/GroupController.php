<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index (){
        $user_id = Auth::guard('member')->user()->id;
        // $user_email = Auth::guard('member')->user()->email;
        $grouplist = Group::select('id','user_id','group_name','total_member')->where('user_id', $user_id)->get();
        return view ('dashboard.community',['grouplist'=>$grouplist]);
    }
    public function createGroup (){
        return view ('dashboard.creategroup');
    }
    public function makeGroup (Request $request){
        $validate = $request->validate(
            [
                'group-description'=>'required|string',
                'group-title'=>'required|string'
            ]
        );
        $group_title = $validate['group-title'];
        $group_description = $validate['group-description'];
        $group_owner = Auth::guard('member')->user()->username;
        $owner_id = Auth::guard('member')->user()->id;
        Group::create(
            [
                'user_id' =>$owner_id,
                'group_creator' =>$group_owner,
                'group_name' =>$group_title,
                'group_description' =>$group_description,
               

            ]
        );
        return redirect('dashboard.index');

    }
}

