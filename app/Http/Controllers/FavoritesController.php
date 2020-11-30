<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $favorites = $user->favorites()
            // order by pivot table's created_at column
            ->orderByDesc('favorites.created_at')
            ->paginate(10);

        return view('books.favorites', ['favorites' => $favorites]);
    }

    public function update(Book $book)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->favorites()->where('book_id', $book->id)->exists()) {
            return redirect()->back()
                ->with('error', 'This item is already in your favorites!');
        }

        // Since ->favorites() returns a BelongsToMany
        // relation, the ->attach() method is available
        $user->favorites()->attach($book);

        return redirect()->back()
            ->with('success', 'Book, ' . $book->title . ' Added to your reading list.');
    }

    public function destroy(Book $book)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Since ->favorites() returns a BelongsToMany
        // relation, the ->detach() method is available
        $user->favorites()->detach($book);

        return redirect()->back()
            ->with('success', 'Book removed from favorites');
    }
}
