<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Book;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function show()
    {
       return view('book');
    }
}
