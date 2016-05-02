<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Hobby extends Model
{
    //
    protected $fillable = array('name', 'user_id');

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
