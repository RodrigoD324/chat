<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('chat.login');
    }
}
