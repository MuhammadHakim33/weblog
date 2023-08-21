<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::controller(PostController::class)->group(function () {
        Route::get('/posts/drafts', 'draft');
        Route::put('/posts/{id}/reject', 'reject');
        Route::put('/posts/{id}/publish', 'publish');
        Route::put('/posts/{id}/review', 'review');
        Route::resource('/posts', PostController::class);
    });
   
    Route::resource('/comments', CommentController::class)->only(['index', 'store']);

    Route::resource('/categories', CategoryController::class)->except('show');

    Route::resource('/authors', AuthorController::class);

    Route::controller(AuthorController::class)->group(function () {
        Route::put('/authors/{id}/disabled', 'disabled');
        Route::put('/authors/{id}/activated', 'activated');
    });
    
    Route::controller(SubscriberController::class)->group(function () {
        Route::get('/subscribers', 'index');
        Route::get('/subscribers/email', 'email');
        Route::post('/subscribers', 'send');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/profile', 'formGeneral');
        Route::get('/profile/change-password', 'formPassword');
        Route::put('/profile/{id}', 'update');
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::put('/change-password', [PasswordController::class, 'change']);
});

Route::middleware('guest')->group(function() {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate');
    });

    Route::controller(PasswordController::class)->group(function () {
        Route::get('/forget-password', 'request');
        Route::post('/forget-password', 'send');
        Route::get('/reset-password/{token}', 'edit')->name('password.reset');
        Route::post('/reset-password', 'reset')->name('password.update');
    });
});
