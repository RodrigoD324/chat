<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct(
        // protected Login $auth
    ) {}

    public function index(): View
    {
        return view('register.register');
    }
}
