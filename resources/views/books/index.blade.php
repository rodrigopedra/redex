@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <a  class="nav-link float-right add_link" href="{{route('books.create')}}">add new book</a>
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
                    <p class="card-text">{{$book['author']}}</p>
                    <img src="{{$book['image']}}" alt="{{$book['title']}}" class="card-img">
                    <a  class="btn btn-light" href="{{route('books.show', $book['id'])}}">Lees meer</a>
                    <a  class="btn btn-light" href="#">Voeg toe aan leeslijst</a>

                </div>
            @endforeach
        </div>
    </div>
@endsection
