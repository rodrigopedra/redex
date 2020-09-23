@extends('layouts.app')

@section('content')
    <header>
        <h1>Voeg een boek toe</h1>
        <a href="{{route('books')}}">Terug naar overzicht</a>
    </header>

    <div class="container">
        <form method="post" action="{{route('books.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="title">
                @if ($errors->has('title'))
                    <span class="alert">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Beschrijving</label>
                <input type="text" class="form-control" id="description" name="description">
                @if ($errors->has('description'))
                    <span class="alert">{{$errors->first('description')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Afbeelding</label>
                <input type="text" class="form-control" id="image" name="image"/>
            </div>
            <div class="form-group">
                <label for="author">Auteur</label>
                <input type="text" class="form-control" id="author" name="author">
                @if ($errors->has('description'))
                    <span class="alert">{{$errors->first('author')}}</span>
                @endif
            </div>
            <button type="submit" class="btn-primary btn-block">Boek Opslaan</button>
        </form>
    </div>
@endsection
