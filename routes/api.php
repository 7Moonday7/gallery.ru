<?php

use App\Http\Controllers\Api\PaintingController;
use App\Http\Controllers\Api\AuthorController;
use \App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('/registration', [UserController::class, 'registration'])->name('registration');
Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::prefix('painting')->name('painting.')->group(function () {
    Route::get('', [PaintingController::class, 'getAll'])->name('getAll');
    Route::get('/{painting}', [PaintingController::class, 'getOne'])->name('getOne');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('painting')->name('painting.')->group(function () {
        Route::post('store', [PaintingController::class, 'store'])->name('store');
        Route::patch('{painting}/update', [PaintingController::class, 'update'])->name('update');
        Route::delete('{painting}/delete', [PaintingController::class, 'delete'])->name('delete');
    });

    Route::prefix('author')->name('author.')->group(function () {
        Route::post('store', [AuthorController::class, 'store'])->name('store');
        Route::patch('{author}/update', [AuthorController::class, 'update'])->name('update');
    });
});

