<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Skill;
use App\Study;
use App\Hobby;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
