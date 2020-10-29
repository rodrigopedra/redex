@extends('layouts.app')

@section('content')
    <header>
        <h1>Update een boek</h1>
        <a href="{{route('books')}}">Terug naar overzicht</a>
    </header>

    <div class="container">
        <form method="post" action="{{route('books.update', $book->id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
                @if ($errors->has('title'))
                    <span class="alert">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="author">Auteur</label>
                <input type="text" class="form-control" id="author" name="author" value="{{$book->author}}">
                @if ($errors->has('author'))
                    <span class="alert">{{$errors->first('author')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Beschrijving</label>
                <input type="text" class="form-control" id="description" name="description" value="{{$book->description}}">
                @if ($errors->has('description'))
                    <span class="alert">{{$errors->first('description')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Afbeelding</label>
                <input type="text" class="form-control" id="image" name="image value="{{$book->image}}""/>
            </div>
            <button type="submit" class="btn-primary btn-block">Edit Boek</button>
        </form>
    </div>
@endsection
