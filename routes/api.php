<?php

use App\Http\Controllers\CardController;
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


Route::get('/cards/{card}', 'CardController@show');
Route::get('/cardtest', 'CardController@showtest');
Route::post('/cards/store', 'CardController@store')->name('storeCard');
Route::get('/cards/check/{number}', [CardController::class, 'actionCheckByNumber']);
Route::post('/cards/set-password/{number}', [CardController::class, 'actionSetPassword']);
Route::post('/cards/get-data/{number}', [CardController::class, 'actionGetData']);
Route::post('/cards/update/{number}', [CardController::class, 'actionUpdate']);
