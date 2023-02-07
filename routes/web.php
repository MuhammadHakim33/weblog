<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


/**
 * Post Route
 */
Route::get('/posts/drafts', [PostController::class, 'draft'])->middleware('auth');
Route::put('/posts/{id}/reject', [PostController::class, 'reject'])->middleware('auth');
Route::put('/posts/{id}/publish', [PostController::class, 'publish'])->middleware('auth');
Route::put('/posts/{id}/review', [PostController::class, 'review'])->middleware('auth');
Route::resource('/posts', PostController::class)->middleware('auth');


/**
 * Category Route
 */
Route::resource('/categories', CategoryController::class)->middleware('auth');


/**
 * Profile Route
 */
Route::get('/profile', [UserController::class, 'formGeneral'])->middleware('auth');
Route::get('/profile/change-password', [UserController::class, 'formPassword'])->middleware('auth');
Route::put('/profile/{id}', [UserController::class, 'update'])->middleware('auth');


/**
 * Auth Route
 */
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/forget-password', [PasswordController::class, 'resetLink']);
Route::get('/new-password', function() {
    return view('operator.auth.form-new-password', [ 'title' => 'Create Password']);
});


/**
 * Manage Password Route
 */
Route::put('/change-password', [PasswordController::class, 'change'])->middleware('auth');