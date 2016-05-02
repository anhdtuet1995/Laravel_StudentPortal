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
    	return view('group.index');
    }
}
