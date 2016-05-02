<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Group extends Model
{
    protected $fillable = array('name', 'description', 'github', 'leader');

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function getLeader(){
    	$user= User::find($this->leader);
    	return $user;
    }
}
