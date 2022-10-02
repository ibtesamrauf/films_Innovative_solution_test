<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmFrontendController;
use App\Http\Controllers\CommentController;

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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect()->route('films.index');
});

// for comments 
Route::get('comment/create', [CommentController::class, 'create'])->name('comment.create');
Route::post('comment', [CommentController::class, 'store'])->name('comment.store');

// for comments routes 
Route::resource('films', FilmFrontendController::class);
Route::get('{slug}', [FilmFrontendController::class, 'showFilmSlug']);


