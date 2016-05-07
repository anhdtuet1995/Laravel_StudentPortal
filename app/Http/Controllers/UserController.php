<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Skill;
use Notifynder;
use App\Group;
use Fenos\Notifynder\Models\Notification;

class UserController extends Controller
{
    public function index(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	$skills = User::find($id)->skills()->get();
    	$languageskills = User::find($id)->languageskills()->get();
    	$hobbies = User::find($id)->hobbies()->get();
    	$studies = User::find($id)->studies()->orderBy('publication_date', 'desc')->get();
    	return view('user.show')->with([
    		'user' => $user,
    		'skills' => $skills,
    		'hobbies' => $hobbies,
    		'studies' => $studies,
    		'languageskills' => $languageskills,
    	]);
    }

    public function edit(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $skills = User::find($id)->skills()->get();
        $languageskills = User::find($id)->languageskills()->get();
        $hobbies = User::find($id)->hobbies()->get();
        $studies = User::find($id)->studies()->orderBy('publication_date', 'desc')->get();
        return view('user.edit')->with([
            'user' => $user,
            'skills' => $skills,
            'hobbies' => $hobbies,
            'studies' => $studies,
            'languageskills' => $languageskills,
        ]);
    } 

    public function update(Request $request){
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->school = $request->input('school');
        $user->gender = $request->input('gender');
        $user->major = $request->input('major');
        if($request->file('image') != null){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
            $user->avatar = $file->getFilename().'.'.$extension;
        }
        
        $user->save();
        return redirect('user');
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    public function getProfile($id){
        $user = User::find($id);

        return view('user.profile')->with([
            'user' => $user
        ]);
    }

    public function requestToGroup($group_id){
        Notifynder::category('request.user.to.group')
                    ->from(Auth::user()->id)
                    ->to(Group::find($group_id)->getLeader()->id)
                    ->url('http://yoururl.com')
                    ->extra(compact('group_id'))
                    ->send();
        return redirect('group');
    }

    public function acceptToGroup($group_id, $noti_id){
        Group::find($group_id)->addUser(Auth::user());
        $noti = Notification::find($noti_id);
        $noti->read = 1;
        $noti->save();
        Notifynder::category('accept.user.to.group')
                    ->from(Auth::user()->id)
                    ->to(Group::find($group_id)->getLeader()->id)
                    ->url('http://yoururl.com')
                    ->extra(compact('group_id'))
                    ->send();
        return redirect('/user/group/'.$group_id.'/panel');
    }

    public function deleteNotification($noti_id){
        $noti = Notification::find($noti_id);
        $noti->read = 1;
        $noti->save();
        return redirect('user/');
    }
}   
