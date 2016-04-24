<?php

use App\Skill;
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

    Route::auth();

    Route::group(['prefix' => 'user'], function () {
    	Route::resource('/', 'UserController');
    });
});