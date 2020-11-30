<?php

namespace App\Http\Controllers;

use App\Models\Book;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin');
    }

    public function index()
    {
        // the ::query() builds a new query builder
        // which Laravel kind of does automatically
        // when you call a query builder's method, such
        // as ->where() or ->orderBy()
        // the advantage here is having the code editor
        // playing nicer with code completion and validation
        $books = Book::query()
            ->orderBy('id')
            ->get();


        return view('books.panel', [
            'books' => $books,
        ]);
    }
}
