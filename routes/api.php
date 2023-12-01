<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('email/resend', [AuthController::class, 'resend'])->name('verification.resend');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::patch('user', [UserController::class, 'update']);
    Route::post('me', [AuthController::class, 'me']);
    Route::delete('user', [UserController::class, 'destroy']);

    Route::post('user/image', [ImageController::class, 'upload']);
});
