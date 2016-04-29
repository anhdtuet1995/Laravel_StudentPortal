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

    protected function createSkill(array $data)
    {
        return Skill::create([
            'name' => $data['skill'],
            'value' => $data['mark'],
            'user_id' => Auth::user()->id,
        ]);
    }

    public function addSkill(Request $request){
        $this->createSkill($request->all());
        return response()->json();
    }

    public function resSkill(Request $request){
        $id = $request->get('user_id');
        $skill = User::find($id)->skills()->get();
        return response()->json($skill);
    }

}
