<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'id_user'; 
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'email',
        'password',
        'google_sub',
        'name',
        'picture_url',
    ];

    public $timestamps = false;
}