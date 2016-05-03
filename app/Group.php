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

    public function addUser(User $user){
    	return $this->users()->attach($user->id);
    }

    public function removeUser(User $user){
    	return $this->users()->detach($user->id);
    }

    public function getLeader(){
    	$user= User::find($this->leader);
    	return $user;
    }

    public function hasUser($user_id){
    	if(sizeof($this->users()->where('id', '=', $user_id)->get()) > 0){
    		return true;
    	}
    	else return false;
    }

    public function isLeader($user_id){
    	if($this->leader == $user_id){
    		return true;
    	}
    	else return false;
    }

    public function isMember($user_id){
    	if($this->leader != $user_id && $this->hasUser($user_id)){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
}
