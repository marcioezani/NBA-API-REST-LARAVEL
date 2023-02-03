<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;

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

Route::get('players', [PlayerController::class, 'index'])->name('players.index');
Route::get('players/{id}', [PlayerController::class, 'show'])->name('players.show');

Route::get('teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('teams/{id}', [TeamController::class, 'show'])->name('teams.show');

Route::get('games', [GameController::class, 'index'])->name('games.index');
Route::get('games/{id}', [GameController::class, 'show'])->name('games.show');