<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Group;

class AdminGroupController extends Controller
{
    public function showPanel($id){
    	if(Group::find($id)->hasUser(Auth::user()->id) ){
    		$group = Group::find($id);
    		return view('user.group.panel')->with([
    			'group' => $group
    		]);
    	}
    }

    public function edit($id){
    	if(Auth::user()->isLeaderGroup($id)){
    		$group = Group::find($id);
    		return view('user.group.edit')->with([
    			'group' => $group
    		]);
    	}
    }

	public function update(Request $request, $id){
		$group = Group::find($id);

		$group->name = $request->input('name');
		$group->description = $request->input('description');
		$group->github = $request->input('github');

		$group->save();
		return redirect('user/group/'.$id.'/panel');
	}

	public function member($id){
		$users = Group::find($id)->users()->get();
		$group = Group::find($id);
		return view('user.group.member')->with([
			'users' => $users,
			'group' => $group
		]);
	}

	public function deleteMember($id, $user_id){
		if(Auth::user()->isLeaderGroup($id)){
			Group::find($id)->removeUser(User::find($user_id));
			return redirect('user/group/'.$id.'/panel/member');
		}
	}

	public function changeLeader($id, $user_id){
		if(Auth::user()->isLeaderGroup($id)){
			$group = Group::find($id);
			$group->leader = $user_id;
			$group->save();
			return redirect('user/group/'.$id.'/panel/');
		}
	}
}
