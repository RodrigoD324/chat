<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'id_user'; 
    public $timestamps = false;
    
    protected $fillable = [
        'email',
        'password',
        'google_sub',
        'name',
        'picture_url',
    ];
}