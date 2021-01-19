<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();
Route::middleware(['enabled'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])
        ->name('users.show')
;
    Route::patch('/users/{user}/d', [App\Http\Controllers\UsersController::class, 'disable']) //TODO rework
        ->name('users.disable')
;
    Route::patch('/users/{user}/e', [App\Http\Controllers\UsersController::class, 'enable']) //TODO rework
        ->name('users.enable')
;

    Route::get('/movies/{user}', [App\Http\Controllers\MoviesController::class, 'index'])
        ->name('movies.show')
        ->middleware('private')
;
    Route::get('/friends/{user}', [App\Http\Controllers\FriendsController::class, 'index'])
        ->name('friends.show')
        ->middleware('private')
;

    Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])
        ->name('profile.show')
        ->middleware('private')
;
    Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])  //TODO rework
        ->name('profile.edit')
        ->middleware('private')
;
    Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])
        ->name('profile.update')
        ->middleware('private')
;

    Route::post('/profile/{user}/af', [App\Http\Controllers\ProfilesController::class, 'addOrRemoveFriend'])

;

    Route::get('/m/create', [App\Http\Controllers\MoviesController::class, 'create'])  //TODO rework
;
    Route::get('/m/{movie}', [App\Http\Controllers\MoviesController::class, 'show'])
        ->name('movie.show')
        ->middleware('private')
;
    Route::get('/m/{movie}/e', [App\Http\Controllers\MoviesController::class, 'edit'])
        ->name('movie.edit')
        ->middleware('private')
;
    Route::get('/m/{movie}/c', [App\Http\Controllers\MoviesController::class, 'copy'])
        ->name('movie.edit')
        ->middleware('private')
;

    Route::patch('/m/{movie}', [App\Http\Controllers\MoviesController::class, 'update'])
        ->middleware('private')
;
    Route::delete('/m/{movie}', [App\Http\Controllers\MoviesController::class, 'destroy'])
;
    Route::post('/m', [App\Http\Controllers\MoviesController::class, 'store'])

;

    Route::get('/settings/{user}', [App\Http\Controllers\SettingsController::class, 'index'])
        ->name('settings.show')
;
    Route::post('/settings/{user}/p', [App\Http\Controllers\SettingsController::class, 'private'])
;
});
