<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CommentsController;

Auth::routes();

Route::get('/', [BooksController::class, 'index'])->name('books');

Route::resources(['books' => BooksController::class,]);

Route::post('/books/{book}/comments', [CommentsController::class, 'store'])->name('comments.store');

Route::get('/home', [BooksController::class, 'index'])->name('home');
