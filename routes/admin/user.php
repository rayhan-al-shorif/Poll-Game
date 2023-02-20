<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::prefix('user/')
    ->middleware('auth')
    ->name('user.')
    ->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('{id}/view', [UserController::class, 'view'])->name('view');
        Route::get('/create-or-update/{id?}', [UserController::class, 'createOrUpdateView'])->name('createOrUpdateView');
    });
