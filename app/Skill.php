<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Skill extends Model
{
    //
    protected $fillable = array('name', 'value', 'user_id');

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function scopeFilterSkill($query,array $skill){
    	foreach($skill as $s){
    		$query->where('name', 'like', '%'.$s.'%');
    	}

    	return $query->get();
    }
}
