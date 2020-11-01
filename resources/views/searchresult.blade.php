@extends('layouts.app')

@section('content')

    @foreach($books as $book)
        <div class="col-md-3 card border-9 text-center m-1 p-2">
            <img src="{{$book['image']}}" alt="{{$book['title']}}" class="card-img">
            <h2 class="card-title">{{$book['title']}}</h2>
            <p class="card-text">{{$book['author']}}</p>
            <a  class="btn btn-light m-1" href="{{route('books.show', $book['id'])}}">Lees meer</a>
            <a  class="btn btn-light m-1" href="#">Voeg toe aan leeslijst</a>
        </div>
    @endforeach

@endsection
