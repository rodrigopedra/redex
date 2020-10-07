@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Books</h1>
        <a  class="nav-link float-right" href="{{route('books.create')}}">Voeg een nieuw book toe.</a>
    </header>

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <storng>{{ $message }}</storng>
            </div>
        @endif
        <div class="row">
            @foreach($books as $book)
                <div class="col-sm card border-9">
                    <h2 class="card-title">{{$book['title']}}</h2>
                    <p>{{ $book->category->title}}</p>
                    <p class="card-text">{{$book['author']}}</p>
                    <img src="{{$book['image']}}" alt="{{$book['title']}}" class="card-img">
                    <a  class="btn btn-light" href="{{route('books.show', $book['id'])}}">Lees meer</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
