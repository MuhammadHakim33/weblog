<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
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
Route::resource('/posts', PostController::class)->middleware('auth');

/**
 * Auth Route
 */
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

