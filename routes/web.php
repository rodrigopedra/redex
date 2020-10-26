<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CommentsController;


Route::get('/', [BooksController::class, 'index'])->name('books');
Route::get('/books', [BooksController::class, 'index'])->name('books');
Route::get('books/create', [BooksController::class, 'create'])->name('books.create')->middleware('auth','admin');
Route::post('books/store', [BooksController::class, 'store'])->name('books.store');
Route::get('books/{id}', [BooksController::class, 'show'])->name('books.show');

Route::post('/books/{book}/comments', [CommentsController::class, 'store'])->name('comments.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
