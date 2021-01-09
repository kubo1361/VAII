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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('/m/create', [App\Http\Controllers\MoviesController::class, 'create']);
Route::get('/m/{movie}', [App\Http\Controllers\MoviesController::class, 'show']);
Route::delete('/m/{movie}', [App\Http\Controllers\MoviesController::class, 'destroy']);
Route::post('/m', [App\Http\Controllers\MoviesController::class, 'store']);

Route::get('/s/create', [App\Http\Controllers\SeriesController::class, 'create']);
Route::get('/s/{serie}', [App\Http\Controllers\SeriesController::class, 'show']);
Route::post('/s', [App\Http\Controllers\SeriesController::class, 'store']);

Route::get('/b/create', [App\Http\Controllers\BooksController::class, 'create']);
Route::get('/b/{book}', [App\Http\Controllers\BooksController::class, 'show']);
Route::post('/b', [App\Http\Controllers\BooksController::class, 'store']);
