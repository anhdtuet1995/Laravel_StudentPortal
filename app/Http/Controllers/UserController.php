<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
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
}
