<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    public function google(array $data)
    {
        if (!isset($data['credential']) || !isset($data['g_csrf_token'])){
            return to_route('chat.access');
        }

        $cookie = $_COOKIE['g_csrf_token'] ?? null;

        if ($data['g_csrf_token'] != $cookie){
            return to_route('chat.access');
        }
    }
}