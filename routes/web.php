<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CommentsController;
use \App\Http\Controllers\CategoryController;

Auth::routes();

Route::get('/', [BooksController::class, 'index'])->name('books');

Route::resource('books', BooksController::class);


Route::get('/panel', [BooksController::class, 'panel'])->name('books.panel');

Route::get('/status/update', [BooksController::class, 'updateStatus'])->name('books.update.status');


Route::post('/books/{book}/comments', [CommentsController::class, 'store'])->name('comments.store');

Route::get('/home', [BooksController::class, 'index'])->name('home');

Route::get('/search', [BooksController::class, 'search']);

Route::get('/books/categories/{category}', [CategoryController::class, 'index']);



