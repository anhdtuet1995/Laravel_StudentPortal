<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";

    protected $fillable = [
    	'name',
    	'description',
    	'status',
    	'user_id',
    	'group_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function group(){
    	return $this->belongsTo('App\Group');
    }
}
