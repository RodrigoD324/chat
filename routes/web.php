<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/auth/login');
});

Route::get('/auth/login', [LoginController::class, 'index'])->name('chat.login');
