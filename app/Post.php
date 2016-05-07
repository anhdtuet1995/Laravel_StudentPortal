<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = [
    	'id',
    	'subject',
    	'content',
    	'user_id',
    	'group_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

	public function group(){
    	return $this->belongsTo('App\Group');
    }  

    public function comments(){
    	return $this->hasMany('App\Comment');
    }  
}
