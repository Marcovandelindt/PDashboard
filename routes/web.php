<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Spotify\SpotifyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

/**
 * Music Routes
 */
Route::get('/music', [App\Http\Controllers\MusicController::class, 'index'])->name('music.index');

/**
 * Spotify Routes
 */
Route::get('/spotify', SpotifyController::class)->name('spotify.index');

/**
 * Gaming Routes
 */
Route::get('/gaming', [App\Http\Controllers\Gaming\GamingController::class, 'index'])->name('gaming.index');
Route::get('/gaming/playstation/sync', [App\Http\Controllers\Gaming\PlaystationSynController::class, 'index'])->name('gaming.playstation.sync');
