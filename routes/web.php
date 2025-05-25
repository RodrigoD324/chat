<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('auth.access');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/auth/acessar', 'index')->name('auth.access');
    Route::post('/auth/google', 'google')->name('auth.google');
});

Route::controller(ChatController::class)->group(function () {
    Route::get('/chat', 'index')->name('chat.index');
});