<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/registration', [AuthController::class, 'signUp'])->name('signup');

Route::get('/profile', [UserController::class, 'show'])
    ->middleware('auth:sanctum')
    ->name('profile');
