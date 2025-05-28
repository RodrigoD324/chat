<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/auth/acessar', 'index')->name('login');
    Route::post('/auth/google', 'google')->name('auth.google');
    Route::post('/auth/logout', 'logout')->name('auth.logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/auth/cadastrar', 'index')->name('register.index');
    Route::post('/auth/user/create', 'create')->name('register.create');
});

Route::controller(ChatController::class)->middleware('auth')->group(function () {
    Route::get('/chat', 'index')->name('chat.index');
});
