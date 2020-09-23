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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BooksController::class, 'show']);
Route::get('news', [BooksController::class, 'index'])->name('news');
Route::get('news/create', [BooksController::class, 'create'])->name('news.create');
Route::post('news/store', [BooksController::class, 'store'])->name('news.store');
Route::get('news/{id}', [BooksController::class, 'show'])->name('news.show');


