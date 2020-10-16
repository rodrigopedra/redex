@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <storng>{{ $message }}</storng>
            </div>
        @endif
        <div class="row flex m-6">
            @foreach($books as $book)
                <div class="col-sm card border-9 m-6 text-center">
                    <img src="{{$book['image']}}" alt="{{$book['title']}}" class="card-img">
                    <h2 class="card-title">{{$book['title']}}</h2>
                    <p class="card-text">{{$book['author']}}</p>
                    <a  class="btn btn-light" href="{{route('books.show', $book['id'])}}">Lees meer</a>
                    <a  class="btn btn-light" href="#">Voeg toe aan leeslijst</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
