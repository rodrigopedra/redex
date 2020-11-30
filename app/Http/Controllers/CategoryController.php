<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Category $category)
    {
        $categories = Category::query()
            ->orderBy('title')
            ->get();

        $books = $category->books()->latest()->get();

        $favorites = auth()->user()->favorites()->pluck('id');

        return view('books.index', [
            'books' => $books,
            'categories' => $categories,
            'category' => $category,
            'favorites' => $favorites,
        ]);
    }
}
