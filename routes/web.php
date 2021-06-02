<?php

use App\Http\Controllers\Web\PaintingController;
use App\Http\Controllers\Web\UserController;
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

//
//Route::get('/', function () {
//    return view('main');
//})->name('app.main');

Route::get('/', [PaintingController::class, 'index'])->name('painting.index');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register', [UserController::class, 'register'])->name('user.register'); //вьюшка
Route::post('signup', [UserController::class, 'signup'])->name('user.signup'); //post

Route::get('auth', [UserController::class, 'auth'])->name('user.auth'); //вьюшка
Route::post('signin', [UserController::class, 'signin'])->name('user.signin'); //post
