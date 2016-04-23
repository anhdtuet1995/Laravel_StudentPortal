<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
	protected $guard = "admins";

	protected $table = "admins";

    protected $filltable = [
    	'name', 'email', 'password',
    ];

    protected $hidden = [
    	'password', 'remember_token',
    ];
}
