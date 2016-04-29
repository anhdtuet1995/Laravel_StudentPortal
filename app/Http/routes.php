<?php

use App\Skill;
use Illuminate\Http\Request;
use App\User;
use App\Hobby;
use Illuminate\Http\Response;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function () {
	Route::get('/', function () {
		$cplus = Skill::where('name', 'like', 'C++')->get();
		$java = Skill::where('name', 'like', 'Java')->get();
		$js = Skill::where('name', 'like', 'JavaScript')->get();
	    $php = Skill::where('name', 'like', 'PHP')->get();
	    $c = Skill::where('name', 'like', 'C')->get();
	    $other = Skill::where('name', 'not like', 'C++')
	    				->where('name', 'not like', 'Java')
	    				->where('name', 'not like', 'JavaScript')
	    				->where('name', 'not like', 'PHP')
	    				->where('name', 'not like', 'C')->get();
	    return view('welcome')->with([
	    	'c' => $c,
	    	'cplus' => $cplus,
	    	'java' => $java,
	    	'js' => $js,
	    	'php' => $php,
	    	'other' => $other,
	    ]);
	});

	Route::get('/search', function () {
	    return view('layouts.search');
	});

	Route::get('/get/{filename}', function($filename){
		$file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
	});


	Route::get('/test', function(Request $request){
		if($request->input('skill') == null && $request->input('hobby') == null){
			$users = User::all();
			return response()->json($users);
		}
		elseif ($request->input('skill') != null && $request->input('hobby') == null) {
			$users = DB::table('users')
					->join('skills', 'users.id', '=', 'skills.user_id')
					->select('users.*', 'skills.name as skill')
					->where('skills.name', 'like', '%'.$request->input('skill').'%')
					->get();	
			foreach($users as $user){
				$user->skill = User::find($user->id)->getSkills(); 
			}
			return response()->json($users);
		}
		elseif ($request->input('skill') == null && $request->input('hobby') != null) {
			return "skill null";
		}
		else{
			return "not null";
		}
	});

	//after sign in
    Route::auth();

    Route::group(['prefix' => 'user'], function () {
    	Route::get('/', 'UserController@index');
    	Route::get('/edit', 'UserController@edit');
    	Route::post('/edit', 'UserController@update');
    	Route::get('/{avatar}','UserController@getUserImage');
    	//skill
    	Route::post('/addSkill', 'UserController@addSkill');
    	Route::get('/skill/resJson', 'UserController@resSkill');
    });
});