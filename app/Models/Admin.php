<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = '_admin';

    public function getAuthIdentifierName()
    {
        return 'username'; 
    }

    protected $fillable = [
        'nama_admin',
        'email_admin',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
