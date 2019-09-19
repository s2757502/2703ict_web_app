<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurant extends Authenticatable
{
    use Notifiable;

    protected $guard = 'restaurant';

    protected $fillable = [
        'name', 'address', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
