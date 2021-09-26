<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';
    protected $fillable = [
        'name','type','mobile','email', 'password','image','status',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
