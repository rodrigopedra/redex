@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <storng>{{ $message }}</storng>
            </div>
        @endif
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorieën
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/books/">Alle</a>
                    <a class="dropdown-item" href="/books/categories/biografie">Biografie</a>
                    <a class="dropdown-item" href="/books/categories/drama">Drama</a>
                    <a class="dropdown-item" href="/books/categories/proza">Proza</a>
                    <a class="dropdown-item" href="/books/categories/non-fictie">Non-fictie</a>
                    <a class="dropdown-item" href="/books/categories/media">Media</a>
                </div>
            </div>
        <div class="row flex justify-content-center">

            @foreach($books as $book)
                <div class="col-md-3 card border-9 text-center m-1 p-2">
                    <img src="{{$book->image}}" alt="{{$book->title}}" class="card-img">
                    <h2 class="card-title">{{$book->title}}</h2>
                    <p class="card-text">{{$book->author}}</p>
                    <p class="card-text">{{$book->category->title}}</p>
                    <a  class="btn btn-light m-1" href="{{route('books.show', $book->id)}}">Lees meer</a>
                    <a  class="btn btn-light m-1" href="#">Voeg toe aan leeslijst</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
