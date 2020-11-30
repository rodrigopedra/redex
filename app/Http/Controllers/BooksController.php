<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        // Prefer using Laravel request object instead
        // of PHP super globals
        $searchTerm = $request->query('q');

        // the ::query() builds a new query builder
        // which Laravel kind of does automatically
        // when you call a query builder's method, such
        // as ->where() or ->orderBy()
        // the advantage here is having the code editor
        // playing nicer with code completion and validation
        $categories = Category::query()
            ->orderBy('title')
            ->get();

        $books = Book::query()
            ->when(filled($searchTerm), function ($query) use ($searchTerm) {
                $searchTerm = '%' . $searchTerm . '%';

                // when you have multiple OR WHEREs conditions
                // prefer to group them into a closure, so
                // the OR conditions don't affect
                // other WHERE conditions
                $query->where(function ($query) use ($searchTerm) {
                    $query->orWhere('title', 'LIKE', $searchTerm)
                        ->orWhere('author', 'LIKE', $searchTerm)
                        ->orWhere('description', 'LIKE', $searchTerm);

                });

                // For example, if the OR conditions were not grouped
                // together, this query could have unexpected results
                // when combined with the condition below
            })
            // instead of filtering in the view
            // this will bring only the books
            // that should be visible
            ->where('is_hidden', false)
            // ->latest() is the same
            // as ->orderByDesc('created_at')
            ->latest()
            ->get();

        // list of the authenticated user favorite books id
        // to check on view.
        // You could eager load the `users` relation on
        // the $books query above, but I thought it would add
        // too much information there
        $favorites = $request->user()->favorites()->pluck('id');

        return view('books.index', [
            'books' => $books,
            'categories' => $categories,
            'searchTerm' => $searchTerm,
            'favorites' => $favorites,
        ]);
    }

    public function create()
    {
        $categories = Category::query()
            ->orderBy('title')
            ->get();

        return view('books.create', [
            'categories' => $categories,
            'book' => new Book(), // needed for form.blade.php partial
        ]);
    }

    public function show(Book $book)
    {
        // check if the book was favorited
        // by the current user
        $isFavorite = auth()->user()
            ->favorites()
            ->where('book_id', $book->id)
            ->exists();

        return view('books.show', [
            'book' => $book,
            'isFavorite' => $isFavorite,
        ]);
    }

    public function edit(Book $book)
    {
        $categories = Category::query()
            ->orderBy('title')
            ->get();

        return view('books.edit', [
            'book' => $book,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        // the Request object validate methods,
        // returns an array with the validated fields
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'required',

            'category' => [
                // this syntax is more expressive and less error prone
                Rule::exists('categories', 'id')
            ],
        ]);

        $book = new Book();
        $book->title = $validated['title'];
        $book->author = $validated['author'];
        $book->description = $validated['description'];
        $book->image = $validated['image'];
        $book->category_id = $validated['category'];
        $book->save();

        return redirect()->route('books.index')
            ->with('success', 'Boek is opgeslagen!');
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'required',

            'category' => [
                // this syntax is more expressive and less error prone
                Rule::exists('categories', 'id')
            ],
        ]);

        $book->title = $validated['title'];
        $book->author = $validated['author'];
        $book->description = $validated['description'];
        $book->image = $validated['image'];
        $book->category_id = $validated['category'];
        $book->save();

        return redirect()->route('books.index')
            ->with('success', 'Book updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted!');
    }
}
