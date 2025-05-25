<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class ChatController extends Controller
{
    public function __construct(
        // protected Login $auth
    ) {}

    public function index(): View
    {
        return view('chat.index');
    }
}
