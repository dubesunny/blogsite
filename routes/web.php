<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::group(
    [
        'middleware' => 'guest',
    ],
    function () {
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/registerattempt', [AuthController::class, 'registerAttempt'])->name('register_attempt');
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/attempt-login', [AuthController::class, 'attempt'])->name('attempt');
        Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
        Route::post('/sendPasswordResetLink', [AuthController::class, 'sendPasswordResetLink'])->name('sendPasswordResetLink');
        Route::post('/reset-password/{token}', [AuthController::class,'passwordReset'])->name('password.reset');
    }
);
Route::group(
    [
        'middleware' => 'auth',
    ],
    function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::resource('user', UserController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('post', PostController::class);
        Route::group(
            [
                'prefix' => 'user',
                'as' => 'user',
            ],
            function () {
                Route::post('/getUserByFilter', [UserController::class, 'getUserByFilter'])->name('filter');
            }
        );

        Route::group(
            [
                'prefix' => 'category',
                'as' => 'category',
            ],
            function () {
                Route::post('/getCategoryByFilter', [CategoryController::class, 'getCategoryByFilter'])->name('filter');
            }
        );

        Route::group(
            [
                'prefix' => 'post',
                'as' => 'post',
            ],
            function () {
                Route::post('/getPostByFilter', [PostController::class, 'getPostByFilter'])->name('filter');
            }
        );
    }
);
