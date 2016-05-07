<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Group;
use DB;
use Notifynder;
use Fenos\Notifynder\Models\Notification;

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

	public function searchMember($id){
		if(Auth::user()->isLeaderGroup($id)){
			$group = Group::find($id);
			$userInGroup = $group->users()->lists('id');
			$users = User::whereNotIn('id', $userInGroup)->get();
			return view('user.group.search-member', compact('users', 'group'));
		}
	}

	public function resultSearch(Request $request, $id){
		if(Auth::user()->isLeaderGroup($id)){
			$userInGroup = Group::find($id)->users()->lists('id');

			if($request->input('skill') == null && $request->input('hobby') == null){
				$users = DB::table('users')
						->select('users.*')
						->whereNotIn('users.id', $userInGroup)
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			elseif ($request->input('skill') != null && $request->input('hobby') == null) {
				$skill = $request->input('skill');
				$arr = explode(",", $skill);
				$users = DB::table('users')
						->join('skills', 'users.id', '=', 'skills.user_id')
						->select('users.*', 'skills.name as skill')
						->whereIn('skills.name', $arr, 'and')
						->whereNotIn('users.id', $userInGroup)
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			elseif ($request->input('skill') == null && $request->input('hobby') != null) {
				$hobby = $request->input('hobby');
				$arr = explode(",", $hobby);
				$users = DB::table('users')
						->join('hobbies', 'users.id', '=', 'hobbies.user_id')
						->select('users.*', 'hobbies.name as hobby')
						->whereIn('hobbies.name', $arr)
						->whereNotIn('users.id', $userInGroup)
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			else{
				$skill = $request->input('skill');
				$arr = explode(",", $skill);
				$hobby = $request->input('hobby');
				$arr2 = explode(",", $hobby);
				$users = DB::table('users')
						->join('skills', 'users.id', '=', 'skills.user_id')
						->join('hobbies', 'users.id', '=', 'hobbies.user_id')
						->select('users.*', 'skills.name as skill')
						->select('users.*', 'hobbies.name as hobby')
						->whereIn('skills.name', $arr, 'and')
						->whereIn('hobbies.name', $arr2)
						->whereNotIn('users.id', $userInGroup)
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
		}
	}

	public function requestToUser($id, $user_id){
		if(Auth::user()->isLeaderGroup($id)){
			$group_id = $id;
	        Notifynder::category('request.group.to.user')
	                    ->from(Group::find($id)->getLeader()->id)
	                    ->to($user_id)
	                    ->url('http://yoururl.com')
	                    ->extra(compact('group_id'))
	                    ->send();
	        return redirect('user/group/'.$group_id.'/panel/member/search');
	    }
    }

    public function acceptToUser($id, $user_id, $noti_id){
    	if(Auth::user()->isLeaderGroup($id)){
    		$group_id = $id;
    		$noti = Notification::find($noti_id);
    		$noti->read=0;
    		$noti->save();
	        Group::find($group_id)->addUser(User::find($user_id));
	        Notifynder::category('accept.group.to.user')
	                    ->from(Auth::user()->id)
	                    ->to(Group::find($group_id)->getLeader()->id)
	                    ->url('http://yoururl.com')
	                    ->extra(compact('group_id'))
	                    ->send();
	        return redirect('user/group/'.$group_id.'/panel/member');
	    }
    }

    
}
