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
    Route::get('/posts/drafts', [PostController::class, 'draft']);
    Route::put('/posts/{id}/reject', [PostController::class, 'reject']);
    Route::put('/posts/{id}/publish', [PostController::class, 'publish']);
    Route::put('/posts/{id}/review', [PostController::class, 'review']);
    Route::resource('/posts', PostController::class);
    Route::resource('/comments', CommentController::class)->only(['index', 'store']);
    Route::resource('/categories', CategoryController::class)->except('show');
    Route::resource('/authors', AuthorController::class);
    Route::put('/authors/{id}/disabled', [AuthorController::class, 'disabled']);
    Route::put('/authors/{id}/activated', [AuthorController::class, 'activated']);
    Route::get('/subscribers', [SubscriberController::class, 'index']);
    Route::get('/subscribers/email', [SubscriberController::class, 'email']);
    Route::post('/subscribers', [SubscriberController::class, 'send']);
    Route::get('/profile', [UserController::class, 'formGeneral']);
    Route::get('/profile/change-password', [UserController::class, 'formPassword']);
    Route::put('/profile/{id}', [UserController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/change-password', [PasswordController::class, 'change']);
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/forget-password', [PasswordController::class, 'request']);
    Route::post('/forget-password', [PasswordController::class, 'send']);
    Route::get('/reset-password/{token}', [PasswordController::class, 'edit'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'reset'])->name('password.update');
});
