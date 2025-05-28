<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Success;
use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(
        protected Register $register
    ) {}

    public function index(): View
    {
        return view('auth.register.index');
    }

    public function create(Request $request): JsonResponse
    {
        $user = $this->register->create($request->all());
        if (is_array($user)) {
            return response()->json($user);
        }

        Auth::login($user, true);
        $success = Success::defineReturnMessageAndCode('UserRegistered');
        return response()->json($success);
    }
}
