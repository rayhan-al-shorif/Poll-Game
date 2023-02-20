<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::prefix('user/')
    ->middleware('auth')
    ->name('user.')
    ->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/user_list', [UserController::class, 'user_list'])->name('user_list');
    });

