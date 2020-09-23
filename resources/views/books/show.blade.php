@extends('layouts.app')

@section('content')
    <header>
        @if($book)
            <h1>{{$book['title']}}</h1>
        @else
        <h1>{{$error}}</h1>
        @endif
            <a href="{{route('books')}}">Terug naar overzicht</a>
    </header>

    <div class="contianer">
        @if($book)
           <div class="book-container">
               <p>{{$book['description']}}</p>
               <p>{{$book['author']}}</p>
               <img src="{{$book['image']}}" alt="{{$book['title']}}">
           </div>
        @endif
    </div>
@endsection
