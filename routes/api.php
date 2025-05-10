<?php

use App\Http\Controllers\GameCatalogController;
use App\Http\Controllers\GameCategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::resource('game-catalog', GameCatalogController::class);
Route::resource('game-category', GameCategoryController::class);
Route::resource('game', GameController::class);

// waiting fix user term condition
Route::middleware('auth:sanctum')->group( function () {
});

