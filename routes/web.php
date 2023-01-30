<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OperatorController;
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
Route::get('/profile', [OperatorController::class, 'formGeneral'])->middleware('auth');
Route::get('/profile/change-password', [OperatorController::class, 'formPassword'])->middleware('auth');
Route::put('/profile/{id}', [OperatorController::class, 'update'])->middleware('auth');


/**
 * Auth Route
 */
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


/**
 * Manage Password Route
 */
Route::put('/change-password', [PasswordController::class, 'change'])->middleware('auth');