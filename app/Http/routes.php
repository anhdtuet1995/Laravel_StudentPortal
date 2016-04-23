<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','Adminauth\AuthController@showLoginForm');
Route::post('/login','Adminauth\AuthController@login');
Route::get('/password/reset','Adminauth\PasswordController@resetPassword');

Route::group(['middleware' => ['admin']], function () {
    //Login Routes...
    Route::get('/admin/logout','Adminauth\AuthController@logout');
	
    

    Route::get('/', function(){
    	return "Admin vao roi day";
    });
});