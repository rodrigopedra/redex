@extends('layouts.app')


@section('content')
    <header class="book_header">
        @if($book)
            <h1>{{$book['title']}}</h1>
        @else
        <h1>{{$error}}</h1>
        @endif
            <a href="{{route('books')}}">Terug naar overzicht</a>
    </header>

    <div class="container align-self-center">
        <div class="mx-auto">
        @if($book)
           <div class="book-container col align-content-center">
               <p>{{$book['description']}}</p>
               <p>{{$book['author']}}</p>
               <img src="{{$book['image']}}" alt="{{$book['title']}}">
           </div>
        </div>
        @endif
    </div>
    <div class="row">
        <ul class="list-group">
        @foreach ($book->comments as $comment)
            <div class="container">
                <li class="list-group-item">{{$comment->body}}</li>
                <li class="list-group-item">{{$comment->created_at}}</li>
                <li class="list-group-item">{{$comment->user_id}}</li>
            </div>
        @endforeach
        </ul>
    </div>
    <div class=" card align-content-center border-9">
        <div class="card-block align-self-center">
            <form method="POST" action="/books/{{ $book->id }}/comments">
                @csrf
                <div class="form-group">
                    <label for="image">comment</label>
                    <input placeholder="your comment here." type="text" class="form-control" id="body" name="body"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-primary btn-block">Comment</button>
                </div>
            </form>
        </div>
    </div>

@endsection


