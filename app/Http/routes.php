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
		$users = User::all();
	    return view('layouts.search')->with([
	    	'users' => $users]);
	});

	Route::get('/get/{filename}', function($filename){
		$file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
	});


	Route::get('/test', function(Request $request){
		if($request->input('skill') == null && $request->input('hobby') == null){
			if($request->get('study') == 0){
				$users = DB::table('users')
						->select('users.*')
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);	
			}
			elseif($request->get('study') == 1){
				$users = DB::table('users')
						->leftJoin('studies', 'users.id', '=', 'studies.user_id')
						->select('users.*')
						->whereNotNull('studies.id')
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			elseif($request->get('study') == 2){
				$users = DB::table('users')
						->leftJoin('studies', 'users.id', '=', 'studies.user_id')
						->select('users.*')
						->whereNull('studies.id')
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
		elseif ($request->input('skill') != null && $request->input('hobby') == null) {
			if($request->get('study') == 0){
				$skill = $request->input('skill');
				$arr = explode(",", $skill);
				$users = DB::table('users')
						->join('skills', 'users.id', '=', 'skills.user_id')
						->select('users.*', 'skills.name as skill')
						->whereIn('skills.name', $arr, 'and')
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			elseif($request->get('study') == 1){
				$skill = $request->input('skill');
				$arr = explode(",", $skill);
				$users = DB::table('users')
						->join('skills', 'users.id', '=', 'skills.user_id')
						->leftJoin('studies', 'users.id', '=', 'studies.user_id')
						->select('users.*', 'skills.name as skill')
						->whereIn('skills.name', $arr, 'and')
						->whereNotNull('studies.id')
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			elseif($request->get('study') == 2){
				$skill = $request->input('skill');
				$arr = explode(",", $skill);
				$users = DB::table('users')
						->join('skills', 'users.id', '=', 'skills.user_id')
						->leftJoin('studies', 'users.id', '=', 'studies.user_id')
						->select('users.*', 'skills.name as skill')
						->whereIn('skills.name', $arr, 'and')
						->whereNull('studies.id')
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
		elseif ($request->input('skill') == null && $request->input('hobby') != null) {
			if($request->get('study') == 0){
				$hobby = $request->input('hobby');
				$arr = explode(",", $hobby);
				$users = DB::table('users')
						->join('hobbies', 'users.id', '=', 'hobbies.user_id')
						->select('users.*', 'hobbies.name as hobby')
						->whereIn('hobbies.name', $arr)
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			elseif($request->get('study') == 1){
				$hobby = $request->input('hobby');
				$arr = explode(",", $hobby);
				$users = DB::table('users')
						->join('hobbies', 'users.id', '=', 'hobbies.user_id')
						->leftJoin('studies', 'users.id', '=', 'studies.user_id')
						->select('users.*', 'hobbies.name as hobby')
						->whereIn('hobbies.name', $arr)
						->whereNotNull('studies.id')
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			elseif($request->get('study') == 2){
				$hobby = $request->input('hobby');
				$arr = explode(",", $hobby);
				$users = DB::table('users')
						->join('hobbies', 'users.id', '=', 'hobbies.user_id')
						->leftJoin('studies', 'users.id', '=', 'studies.user_id')
						->select('users.*', 'hobbies.name as hobby')
						->whereIn('hobbies.name', $arr)
						->whereNull('studies.id')
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
		else{
			if($request->get('study') == 0){
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
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			elseif($request->get('study') == 1){
				$skill = $request->input('skill');
				$arr = explode(",", $skill);
				$hobby = $request->input('hobby');
				$arr2 = explode(",", $hobby);
				$users = DB::table('users')
						->join('skills', 'users.id', '=', 'skills.user_id')
						->join('hobbies', 'users.id', '=', 'hobbies.user_id')
						->leftJoin('studies', 'users.id', '=', 'studies.user_id')
						->select('users.*', 'skills.name as skill')
						->select('users.*', 'hobbies.name as hobby')
						->whereIn('skills.name', $arr, 'and')
						->whereIn('hobbies.name', $arr2)
						->whereNotNull('studies.id')
						->get();	
				foreach($users as $user){
					if(User::find($user->id)->getSkills()) $user->skill = User::find($user->id)->getSkills();
					else $user->skill = "Chưa có";
					if(User::find($user->id)->getHobbies()) $user->hobby = User::find($user->id)->getHobbies();
					else $user->hobby = "Chưa có";
				}
				return response()->json($users);
			}
			elseif($request->get('study') == 2){
				$skill = $request->input('skill');
				$arr = explode(",", $skill);
				$hobby = $request->input('hobby');
				$arr2 = explode(",", $hobby);
				$users = DB::table('users')
						->join('skills', 'users.id', '=', 'skills.user_id')
						->join('hobbies', 'users.id', '=', 'hobbies.user_id')
						->leftJoin('studies', 'users.id', '=', 'studies.user_id')
						->select('users.*', 'skills.name as skill')
						->select('users.*', 'hobbies.name as hobby')
						->whereIn('skills.name', $arr, 'and')
						->whereIn('hobbies.name', $arr2)
						->whereNull('studies.id')
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
	});

	Route::group(['prefix' => 'admin'], function(){
		Route::get('login','Admin\AuthController@getLogin');
		Route::post('login','Admin\AuthController@postLogin');
		Route::get('register','Admin\AuthController@getRegister');
		Route::post('register','Admin\AuthController@postRegister');

		Route::get('dashboard','AdminController@getIndex');
		
		Route::get('user', 'AdminController@getUsers');
		Route::post('user/deleteMany', 'AdminController@deleteManyUser');
		Route::post('user/add', 'AdminController@addUser');
		Route::get('user/edit/{id}', 'AdminController@editUser');
		Route::post('user/edit/{id}', 'AdminController@updateUser');

		Route::get('group', 'AdminController@getGroups');
		Route::post('group/deleteMany', 'AdminController@deleteManyGroup');
		Route::post('group/add', 'AdminController@addGroup');
		Route::get('group/edit/{id}', 'AdminController@editGroup');
		Route::post('group/edit/{id}', 'AdminController@updateGroup');

		Route::get('logout','AdminController@getLogout');
	});

	//after sign in
    Route::auth();

    Route::group(['prefix' => 'user'], function () {
    	Route::get('/', 'UserController@index');
    	//tuong tac


    	//user
    	Route::get('/edit', 'UserController@edit');
    	Route::post('/edit', 'UserController@update');
    	Route::get('/{avatar}','UserController@getUserImage');
    	Route::get('/profile/{id}', 'UserController@getProfile');
    	Route::get('/request/{group_id}/', 'UserController@requestToGroup');
    	Route::get('/accept/{group_id}/{noti_id}', 'UserController@acceptToGroup');
    	Route::get('/notification/delete/{noti_id}', 'UserController@deleteNotification');

    	Route::group(['prefix' => 'skill'], function(){
    		Route::delete('/{id}', 'SkillController@destroy');
    		Route::get('/resJson', 'SkillController@resSkill');
    		Route::post('/add', 'SkillController@addSkill');
    		
    	});

    	Route::group(['prefix' => 'hobby'], function(){
    		Route::delete('/{id}', 'HobbyController@destroy');
    		Route::get('/resJson', 'HobbyController@resHobby');
    		Route::post('/add', 'HobbyController@addHobby');	
    	});	

    	Route::group(['prefix' => 'study'], function(){
    		Route::delete('/{id}', 'StudyController@destroy');
    		Route::get('/resJson', 'StudyController@resStudy');
    		Route::post('/add', 'StudyController@addStudy');	
    	});

    	Route::group(['prefix' => 'group'], function(){
    		Route::get('/{id}/panel', 'AdminGroupController@showPanel');
    		Route::get('/{id}/panel/edit', 'AdminGroupController@edit');
    		Route::post('/{id}/panel/update', 'AdminGroupController@update');
    		Route::get('/{id}/panel/member', 'AdminGroupController@member');
    		Route::delete('/{id}/panel/member/{user_id}', 'AdminGroupController@deleteMember');
    		Route::post('/{id}/panel/member/change/{user_id}', 'AdminGroupController@changeLeader');
    		Route::get('/{id}/panel/member/search', 'AdminGroupController@searchMember');
    		Route::get('/{id}/panel/member/filter', 'AdminGroupController@resultSearch');
    		Route::get('/{id}/panel/member/request/{user_id}', 'AdminGroupController@requestToUser');
    		Route::get('/{id}/panel/member/accept/{user_id}/{noti_id}', 'AdminGroupController@acceptToUser');
    		Route::get('/{id}/panel/timeline', 'AdminGroupController@getTimeline');
    		Route::post('/{id}/panel/timeline/post/addPost', 'AdminGroupController@addPost');
    		Route::post('/{id}/panel/timeline/post/{post_id}/reply', 'AdminGroupController@addComment');
    		Route::get('/{id}/panel/timeline/post/{post_id}/resComment', 'AdminGroupController@resComment');
    		Route::get('/{id}/panel/task/manage', 'AdminGroupController@manageTask');
    		Route::post('/{id}/panel/task/manage/addTask', 'AdminGroupController@addTask');
    		Route::post('/{id}/panel/task/manage/{task_id}/editTask', 'AdminGroupController@editTask');
    		Route::delete('/{id}/panel/task/manage/{task_id}', 'AdminGroupController@destroy');
    		Route::get('/{id}/panel/mytask', 'AdminGroupController@personalTask');
    		Route::post('/{id}/panel/mytask/{task_id}', ['as' => 'changeStatus', 'uses' => 'AdminGroupController@changeStatusTask']);
    		Route::post('/{id}/panel/task/change/status/{task_id}', ['as' => 'adminChangeStatus', 'uses' => 'AdminGroupController@adminChangeStatusTask']);
    		Route::get('/{id}/panel/leave', 'UserController@leaveGroup');
    		Route::get('/{id}/panel/group/delete', 'AdminGroupController@deleteGroup');
    	});
    });

    Route::group(['prefix' => 'group'], function () {
    	Route::get('/', 'GroupController@index');
    	Route::get('/create', 'GroupController@create');
    	Route::post('/store', 'GroupController@store');
    	Route::get('/{id}', 'GroupController@show');
    	Route::get('/search/res', 'GroupController@searchGroup');
    });
});


