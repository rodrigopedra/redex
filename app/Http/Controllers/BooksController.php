<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function search()
    {
        $search_text = $_GET['q'];
        $books = Book::where('title', 'LIKE', "%".$search_text.'%')->get();
        return view('books.searchresult', compact('books'));

    }

    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => ['exists:categories,id'],
        ]);

        $books = new Book();
        $books->title = $request->get('title');
        $books->author = $request->get('author');
        $books->description = $request->get('description');
        $books->image = $request->get('image');
        $books->category_id = $request->get('category');


        $books->save();
        return redirect('books')->with('success', "Boek is opgeslagen!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $book = Book::find($id);
        if ($book === null) {
            abort(404, "No book has been found.");
        }

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => ['exists:categories,id'],
        ]);

        $books = Book::find($id);
        $books->title = $request->get('title');
        $books->author = $request->get('author');
        $books->description = $request->get('description');
        $books->image = $request->get('image');
        $books->category_id = $request->get('category');
        $books->save();

        return redirect('books')->with('success', "Boek is aangepast!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('books')->with('success', 'Book deleted!');
    }
}
