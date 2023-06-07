<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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


Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/filter', [GameController::class, 'filter'])->name('games.filter');
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::put('/games/{id}', 'GameController@update')->name('games.update');
Route::get('/games/{id}/edit', 'GameController@edit')->name('games.edit');
