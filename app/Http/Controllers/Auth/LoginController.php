<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Success;
use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(
        protected Login $auth
    ) {}

    public function index(): View
    {
        return view('auth.login.index');
    }

    public function login(Request $request): JsonResponse
    {
        $user = $this->auth->login($request->all());
        if (is_array($user)) {
            return response()->json($user);
        }
        Auth::login($user, true);
        $success = Success::defineReturnMessageAndCode('UserAuthenticated');
        return response()->json($success);
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
