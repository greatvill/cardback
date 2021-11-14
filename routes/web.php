<?php

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', 'CardController@welcome')->name('dashboard');

Route::get('/cards/create', 'CardController@create')->name('createCard');
Route::post('/cards/store', 'CardController@store')->name('storeCard');

Route::get('/cards/edit/{card}', 'CardController@edit')->name('editCard');
Route::post('/cards/edit/update/{card}', 'CardController@update')->name('updateCard');

Route::get('/cards/{card}', 'CardController@show')->name('showCard');

Route::get('/cards/download/{card}', 'CardController@download')->name('downloadCard');

require __DIR__.'/auth.php';
