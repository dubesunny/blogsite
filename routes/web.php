<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;
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
        Route::get('/reset-password/{token}', [AuthController::class, 'passwordReset'])->name('password.reset');
        Route::post('/resetPassword', [AuthController::class, 'resetPassword'])->name('resetPassword');
    }
);
Route::group(
    [
        'middleware' => 'auth',
    ],
    function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
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
                Route::post('/sort', [UserController::class, 'sort'])->name('sort');
            }
        );

        Route::group(
            [
                'prefix' => 'category',
                'as' => 'category',
            ],
            function () {
                Route::post('/getCategoryByFilter', [CategoryController::class, 'getCategoryByFilter'])->name('filter');
                Route::post('/sort', [CategoryController::class, 'sort'])->name('sort');
            }
        );

        Route::group(
            [
                'prefix' => 'post',
                'as' => 'post',
            ],
            function () {
                Route::post('/getPostByFilter', [PostController::class, 'getPostByFilter'])->name('filter');
                Route::post('/sort', [PostController::class, 'sort'])->name('sort');
            }
        );
    }
);

Route::get('/',[FrontEndController::class,'index'])->name('index');
Route::get('/categories/{category:slug}',[FrontEndController::class,'categories'])->name('categories');
Route::get('/posts/{post:slug}',[FrontEndController::class,'postDetails'])->name('post.details');

Route::post('/comment',[FrontEndController::class,'comment'])->name('comment')->middleware('auth');

