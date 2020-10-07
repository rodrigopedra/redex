<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

//books
Route::get('/', [BooksController::class, 'index'])->name('books');
Route::get('books/create', [BooksController::class, 'create'])->name('books.create')->middleware('auth');
Route::post('books/store', [BooksController::class, 'store'])->name('books.store');
Route::get('books/{id}', [BooksController::class, 'show'])->name('books.show');

//comments
Route::get('comments/create', [BooksController::class, 'create'])->name('comments.create')->middleware('auth');
Route::post('comments/store', [BooksController::class, 'store'])->name('comments.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
