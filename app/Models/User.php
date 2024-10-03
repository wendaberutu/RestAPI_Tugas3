<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'phone', 'gender', 'image', 'role', 'password', 'status', 'email_verified_at', 'phone_verified_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
