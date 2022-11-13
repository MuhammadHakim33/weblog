<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
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

Route::get('/admin', function () {
    return view('operator.dashboard.index', ['title' => 'Dashboard']);
})->middleware('auth');

Route::get('/admin/posts', function () {
    return view('operator.posts.index', ['title' => 'Posts']);
})->middleware('auth');

Route::get('/admin/posts/create', function () {
    return view('operator.post_create', ['title' => 'Create Post']);
})->middleware('auth');

Route::get('/admin/register', [RegistrationController::class, 'index'])->middleware('guest');
Route::post('/admin/register', [RegistrationController::class, 'store']);

Route::get('/admin/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'authenticate']);
Route::post('/admin/logout', [LoginController::class, 'logout']);

