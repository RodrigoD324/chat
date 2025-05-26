<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

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
        $user = $this->auth->google($request->all());
        if (!$user) {
            return to_route('login');
        }
        Auth::login($user, true);
        return to_route('chat.index');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
