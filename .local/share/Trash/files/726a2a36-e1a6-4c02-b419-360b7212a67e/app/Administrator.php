<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable
{
    use Notifiable;

    protected $guard = 'administrator';

    protected $fillable = [
        'name', 'address', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
