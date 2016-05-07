<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $fillable = [
    	'id',
    	'content',
    	'user_id',
    	'post_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

	public function post(){
    	return $this->belongsTo('App\Post');
    }    
}
