<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Validator;
use App\Group;

class AdminController extends Controller
{
    
    public function __construct() {
    	$this->middleware('admin',['except' => 'getLogout']);
    }
   
    public function getIndex()
    {   
        $user = Auth::guard('admin')->user();
    	return view('admin.welcome');
    }
    
    public function getLogout() {
    	Auth::guard('admin')->logout();
    	return redirect('admin/login');
    }
   
    public function getUsers(){
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    
    public function deleteManyUser(Request $request){
        User::destroy($request->dusers);
        return redirect()->back();
    }


    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'school' => $data['school'],
            'major' => $data['major'],
        ]);
    }

    public function addUser(Request $request)
    {
        $this->createUser($request->all());
 
        return response()->json();
    }

    public function editUser($id){
        $user = User::find($id);
        return view('admin.user-edit', compact('user'));
    }

    public function updateUser($id, Request $request){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->school = $request->input('school');
        $user->major = $request->input('major');
        $user->save();
        return redirect('admin/user');
    }

    public function getGroups(){
        $groups = Group::all();
        $users = User::all();
        return view('admin.group', compact('groups', 'users'));
    }

    protected function createGroup(array $data)
    {
        User::find($data['leader'])->groups()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'github' => $data['github'],
            'leader' => $data['leader'],
            'limituser' => $data['limituser']
        ]);
    }

    public function addGroup(Request $request)
    {
        $data = $request->all();
        $this->createGroup($data);
                
        return redirect('admin/group');
    }

    public function deleteManyGroup(Request $request){
        Group::destroy($request->dgroups);
        return redirect()->back();
    }

    public function editGroup($id){
        $group = Group::find($id);
        $users = User::all();
        return view('admin.group-edit', compact('group', 'users'));
    }

    public function updateGroup($id, Request $request){
        $group = Group::find($id);
        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->github = $request->input('github');
        $group->leader = $request->get('leader');
        if($group->limituser <  $request->input('limituser')){
            $group->limituser =  $request->input('limituser');
        }
        $group->save();
        return redirect('admin/group');
    }
}