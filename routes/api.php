<?php

use App\Http\Controllers\LojasController;
use App\Http\Controllers\ProdutosController;
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

Route::prefix('lojas')->controller(LojasController::class)->group(function () {
    Route::get('/index', 'index');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::post('/update/{id}', 'update');
    Route::get('/destroy/{id}', 'destroy');
});

Route::prefix('produtos')->controller(ProdutosController::class)->group(function () {
    Route::get('/index', 'index');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::post('/update/{id}', 'update');
    Route::get('/destroy/{id}', 'destroy');
});
