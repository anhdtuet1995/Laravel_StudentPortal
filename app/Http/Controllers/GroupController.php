<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Group;
use App\User;

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
    	$leader = Auth::user()->id;

    	Auth::user()->groups()->create([
    		'name' => $name,
    		'description' => $description,
    		'github' => $github,
    		'leader' => $leader
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
}
