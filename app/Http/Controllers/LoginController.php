<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        protected Login $auth
    ) {}

    public function index(Request $request)
    {
        return view('chat.login');
    }

    public function google(Request $request) 
    {
        return $this->auth->google($request->all());
    }
}
