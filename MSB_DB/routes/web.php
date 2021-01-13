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

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.show');
Route::patch('/users/{user}/d', [App\Http\Controllers\UsersController::class, 'disable'])->name('users.disable'); //TODO secure route
Route::patch('/users/{user}/e', [App\Http\Controllers\UsersController::class, 'enable'])->name('users.enable'); //TODO secure route
Route::get('/friends/{user}', [App\Http\Controllers\FriendsController::class, 'index'])->name('friends.show'); //TODO secure route

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit'); //TODO secure route
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update'); //TODO secure route

Route::get('/movies/{user}', [App\Http\Controllers\MoviesController::class, 'index'])->name('movies.show');
Route::get('/series/{user}', [App\Http\Controllers\SeriesController::class, 'index'])->name('series.show');
Route::get('/books/{user}', [App\Http\Controllers\BooksController::class, 'index'])->name('books.show');

Route::get('/m/create', [App\Http\Controllers\MoviesController::class, 'create']); //TODO secure route
Route::get('/m/{movie}', [App\Http\Controllers\MoviesController::class, 'show']);
Route::delete('/m/{movie}', [App\Http\Controllers\MoviesController::class, 'destroy']); //TODO secure route
Route::post('/m', [App\Http\Controllers\MoviesController::class, 'store']); //TODO secure route

Route::get('/s/create', [App\Http\Controllers\SeriesController::class, 'create']); //TODO secure route
Route::get('/s/{serie}', [App\Http\Controllers\SeriesController::class, 'show']); //TODO secure route
Route::post('/s', [App\Http\Controllers\SeriesController::class, 'store']); //TODO secure route

Route::get('/b/create', [App\Http\Controllers\BooksController::class, 'create']); //TODO secure route
Route::get('/b/{book}', [App\Http\Controllers\BooksController::class, 'show']); //TODO secure route
Route::post('/b', [App\Http\Controllers\BooksController::class, 'store']); //TODO secure route
