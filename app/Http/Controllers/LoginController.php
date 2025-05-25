<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    public function __construct(
        protected Login $auth
    ) {}

    public function index(): View
    {
        return view('auth.login');
    }

    public function google(Request $request): RedirectResponse
    {
        $response = $this->auth->google($request->all());
        if (!$response) {
            return to_route('auth.access');
        }
        $request->session()->put('google', $response);
        return to_route('chat.index');
    }
}
