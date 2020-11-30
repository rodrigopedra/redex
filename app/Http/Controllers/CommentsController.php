<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Book $book)
    {
        $validated = $request->validate([
            'body' => 'required',
        ]);

        $book->comments()->create([
            'user_id' => auth()->id(),
            'body' => $validated['body'],
        ]);

        return back();
    }
}
