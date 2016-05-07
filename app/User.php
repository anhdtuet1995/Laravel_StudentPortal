<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Skill;
use App\Study;
use App\Hobby;
use App\Group;
use Fenos\Notifynder\Notifable;
use Fenos\Notifynder\Models\Notification;

class User extends Authenticatable
{
    use Notifable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills()
    {
        return $this->hasMany('App\Skill');
    }

    public function studies()
    {
        return $this->hasMany('App\Study');
    }

    public function hobbies()
    {
        return $this->hasMany('App\Hobby');
    }

    public function languageskills()
    {
        return $this->hasMany('App\LanguageSkill');
    }

    public function getCreatedDate(){
        return $this->attributes['created_at'];
    }

    public function getSkills(){
        $skill = $this->skills()->get();
        $str = "";
        foreach($skill as $s){
            $str = $str . $s->name . ', ';
        }
        $str = substr($str, 0, strlen($str)-2);
        return $str;
    }

    public function getHobbies(){
        $hobby = $this->hobbies()->get();
        $str = "";
        foreach($hobby as $s){
            $str = $str . $s->name . ', ';
        }
        $str = substr($str, 0, strlen($str)-2);
        return $str;
    }

    public function groups(){
        return $this->belongsToMany('App\Group');
    }

    public function getAllGroupAdmin(){
        $group = Group::where('leader', '=', $this->id)->get();
        return $group;
    }

    public function getOtherGroup(){
        $group = $this->groups()->where('leader', '!=', $this->id)->get();
        return $group;
    }

    public function getGroupNotJoined(){
        $group = $this->groups()->lists('id');
        $groups = Group::whereNotIn('id', $group)->get();   
        return $groups;
    }

    public function isLeaderGroup($group_id){
        if($this->id == Group::find($group_id)->leader){
            return true;
        }
        else return false;
    }

    public function isMemberGroup($group_id){
        if(!$this->isLeaderGroup($group_id) && 
            sizeof(Group::find($group_id)->users()->where('id', '=', $this->id)->get()) > 0 ){
            return true;
        }
        else{
            return false;
        }
    }

    public function notifications(){
        return $this->hasMany('Fenos\Notifynder\Models\Notification', 'to_id');
    }

    public function posts(){
        return $this->hasMany('App\Post', 'post_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'comment_id');
    }
}
