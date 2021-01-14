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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])
    ->name('users.show')
    ->middleware('enabled')
;
Route::patch('/users/{user}/d', [App\Http\Controllers\UsersController::class, 'disable']) //TODO rework
    ->name('users.disable')
    ->middleware('enabled')
;
Route::patch('/users/{user}/e', [App\Http\Controllers\UsersController::class, 'enable']) //TODO rework
    ->name('users.enable')
    ->middleware('enabled')
;
Route::get('/friends/{user}', [App\Http\Controllers\FriendsController::class, 'index'])
    ->name('friends.show')
    ->middleware('enabled')
    ->middleware('private')
    ;

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])
    ->name('profile.show')
    ->middleware('enabled')
    ->middleware('private')
;
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])  //TODO rework
    ->name('profile.edit')
    ->middleware('enabled')
    ->middleware('private')
;
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])
    ->name('profile.update')
    ->middleware('enabled')
    ->middleware('private')
;

Route::get('/movies/{user}', [App\Http\Controllers\MoviesController::class, 'index'])
    ->name('movies.show')
    ->middleware('enabled')
    ->middleware('private')
;
Route::get('/series/{user}', [App\Http\Controllers\SeriesController::class, 'index'])
    ->name('series.show')
    ->middleware('enabled')
    ->middleware('private')
;
Route::get('/books/{user}', [App\Http\Controllers\BooksController::class, 'index'])
    ->name('books.show')
    ->middleware('enabled')
    ->middleware('private')
;

Route::get('/m/create', [App\Http\Controllers\MoviesController::class, 'create'])  //TODO rework
    ->middleware('enabled')
    ->middleware('private')
;
Route::get('/m/{movie}', [App\Http\Controllers\MoviesController::class, 'show'])
    ->middleware('enabled')
    ->middleware('private')
;
Route::delete('/m/{movie}', [App\Http\Controllers\MoviesController::class, 'destroy'])
    ->middleware('enabled')
    ->middleware('private')
;
Route::post('/m', [App\Http\Controllers\MoviesController::class, 'store'])  //TODO rework
    ->middleware('enabled')
    ->middleware('private')
;

Route::get('/s/create', [App\Http\Controllers\SeriesController::class, 'create'])
    ->middleware('enabled')
    ->middleware('private')
;
Route::get('/s/{serie}', [App\Http\Controllers\SeriesController::class, 'show'])
    ->middleware('enabled')
    ->middleware('private')
;
Route::post('/s', [App\Http\Controllers\SeriesController::class, 'store'])
    ->middleware('enabled')
    ->middleware('private')
;

Route::get('/b/create', [App\Http\Controllers\BooksController::class, 'create'])
    ->middleware('enabled')
    ->middleware('private')
;
Route::get('/b/{book}', [App\Http\Controllers\BooksController::class, 'show'])
    ->middleware('enabled')
    ->middleware('private')
;
Route::post('/b', [App\Http\Controllers\BooksController::class, 'store'])
    ->middleware('enabled')
    ->middleware('private')
;

Route::get('/settings/{user}', [App\Http\Controllers\SettingsController::class, 'index'])
    ->name('settings.show')
    ->middleware('enabled')
    ->middleware('private') //TODO only belongs to user middleware
;

Route::post('/settings/{user}/p', [App\Http\Controllers\UsersController::class, 'private'])
    //->middleware('enabled') //TODO only belongs to user middleware
;
