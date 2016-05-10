<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Group;
use App\User;
use DB;

class GroupController extends Controller
{
    public function index(){
    	$groups = Auth::user()->getGroupNotJoined();
    	return view('group.index')->with([
    		'groups' => $groups
    	]);
    }

    public function create(){
    	return view('group.create');
    }

    public function store(Request $request){

    	$name = $request->input('name');
    	$description = $request->input('description');
    	$github = $request->input('github');
        $limituser = $request->input('limituser');
    	$leader = Auth::user()->id;

    	Auth::user()->groups()->create([
    		'name' => $name,
    		'description' => $description,
    		'github' => $github,
    		'leader' => $leader,
            'limituser' => $limituser,
    	]);
    	return redirect('/group');
    }

    public function show($id){
    	if(!Group::find($id)->hasUser(Auth::user()->id)){
    		$group = Group::find($id);
    		return view('group.show')->with([
    			'group' => $group,
    		]);
    	}
    }

    public function searchGroup(Request $request){
        $groupOfUsers = Auth::user()->groups()->lists('id');
        $search = $request->input('keyword');
        if($search == null){
            $groups = Group::whereNotIn('id', $groupOfUsers)->get();
            if($groups != null)
            foreach($groups as $group){
                $group->quantity = Group::find($group->id)->users()->count();
                $group->members = Group::find($group->id)->users()->lists('avatar');
                if(Group::find($group->id)->isFull()) $group->full = 1;
                else $group->full=0;
                $group->taskFinished = Group::find($group->id)->tasks()->where('status', 'finished')->count();
                $group->taskTotal = Group::find($group->id)->tasks()->count();
            }
            return response()->json($groups);
        }
        else{
            $groups = DB::table('groups')
                        ->select('groups.*')
                        ->whereNotIn('groups.id', $groupOfUsers)
                        ->where('groups.name', 'LIKE', '%'.$search.'%')
                        ->orWhere('groups.description', 'LIKE', '%'.$search.'%')
                        ->get();
            if($groups != null)    
            foreach($groups as $group){
                $group->quantity = Group::find($group->id)->users()->count();
                $group->members = Group::find($group->id)->users()->lists('avatar');
                if(Group::find($group->id)->isFull()) $group->full = 1;
                else $group->full=0;
                $group->taskFinished = Group::find($group->id)->tasks()->where('status', 'finished')->count();
                $group->taskTotal = Group::find($group->id)->tasks()->count();

            }
            return response()->json($groups);
        }
    }
}
