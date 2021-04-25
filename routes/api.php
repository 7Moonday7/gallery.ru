<?php

use App\Http\Controllers\PaintingController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('painting')->name('painting.')->group(function () {
    Route::get('', [PaintingController::class, 'getAll'])->name('getAll');
    Route::get('/{painting}', [PaintingController::class, 'getOne'])->name('getOne');
    Route::post('store', [PaintingController::class, 'store'])->name('store');
    Route::patch('{painting}/update', [PaintingController::class, 'update'])->name('update');
    Route::delete('{painting}/delete', [PaintingController::class, 'delete'])->name('delete');
});
