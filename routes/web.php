<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CinemasController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.cinemas');
});

Route::group(['as' => 'admin.'], function () {
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('view_login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'viewRegister'])->name('view_register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::middleware(['auth'])->group(function () {
        /** profile user */
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/profile', [UserController::class, 'viewProfile'])->name('vew_profile');
        Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile');

        /** cinemas */
        Route::prefix('cinemas')->group(function () {
            Route::get('/', [CinemasController::class, 'index'])->name('cinemas');
            Route::post('/{cinema}/update', [CinemasController::class, 'update'])->name('cinemas.update');
            Route::post('/store', [CinemasController::class, 'store'])->name('cinemas.store');
            Route::post('/{cinema}/delete', [CinemasController::class, 'destroy'])->name('cinemas.destroy');
        });

        /** movies */
        Route::prefix('movies')->group(function () {
            Route::get('/', [MovieController::class, 'index'])->name('movie');
            Route::get('/{movie}/detail', [MovieController::class, 'show'])->name('movie.detail');
            Route::post('/{movie}/destroy', [MovieController::class, 'destroy'])->name('movie.delete');
        });
    });
});
