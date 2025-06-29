<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('user', UserController::class);
Route::resource('category', CategoryController::class);
Route::resource('post',PostController::class);

Route::group(
    [
        'prefix' => 'user',
        'as'=> 'user',
    ],
    function () {
        Route::post('/getUserByFilter',[UserController::class,'getUserByFilter'])->name('filter');
    }
);

Route::group(
    [
        'prefix' => 'category',
        'as'=> 'category',
    ],
    function () {
        Route::post('/getCategoryByFilter',[CategoryController::class,'getCategoryByFilter'])->name('filter');
    }
);

Route::group(
    [
        'prefix' => 'post',
        'as'=> 'post',
    ],
    function () {
        Route::post('/getPostByFilter',[PostController::class,'getPostByFilter'])->name('filter');
    }
);
