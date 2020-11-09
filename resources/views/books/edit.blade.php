@extends('layouts.app')

@section('content')
    <header>
        <h1>Edit </h1>
        <a href="{{route('books')}}">Back</a>
    </header>

    <div class="container">
        <form method="post" action="{{route('books.update', $book->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                    @foreach($categories as $category)
                        <option {{ $category->id == old('category', $book->category_id) ? 'selected' : '' }}
                                value="{{ $category->id }}">{{$category->title}}</option>
                    @endforeach
                </select>

                @error('category')
                <span class="alert">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{$book->author}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{$book->description}}">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{$book->image}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn-primary btn-block">Save changes</button>
            </div>
        </form>
    </div>
@endsection
