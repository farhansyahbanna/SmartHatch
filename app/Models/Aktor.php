<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Aktor extends Authenticatable
{
    use Notifiable;

    protected $table = 'aktor';
    protected $fillable = [
        'nama', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'rememberToken'
    ];
}
