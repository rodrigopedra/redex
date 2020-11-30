<?php

namespace App\Http\Controllers;

use App\Models\Book;

/**
 * Having specialized controllers for non-CRUD actions
 * helps keeping controllers lean, makes adding
 * common middlewares easier, and makes it easier
 * to understand and to remember where to find stuff
 */
class ChangeBookVisibilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin');
    }

    /**
     * Instead of having one action to toggle a state,
     * consider using a dedicated action to change each state.
     *
     * So if a request from the frontend fails, it is easier
     * to repeat the action and keep frontend in sync.
     *
     * @param Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeVisible(Book $book)
    {
        $book->is_hidden = false;
        $book->save();

        return response()->json(['message' => 'Book visibility updated successfully.']);
    }

    /**
     * When using specialized controllers, keep the action
     * names expressive, so it is clear what each action performs
     *
     * @param Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeHidden(Book $book)
    {
        $book->is_hidden = true;
        $book->save();

        return response()->json(['message' => 'Book visibility updated successfully.']);
    }
}
