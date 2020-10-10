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

    <div class="container">
        @if($book)
           <div class="book-container">
               <p>{{$book['description']}}</p>
               <p>{{$book['author']}}</p>
               <img src="{{$book['image']}}" alt="{{$book['title']}}">
           </div>
        @endif
    </div>

    <div class="comments">
        <ul class="list-group">

        @foreach ($book->comments as $comment)
            <li class="list-group-item">

                {{$comment->body}}
                {{$comment->created_at}}
                {{$comment->user_id}}

            </li>
        @endforeach

        </ul>
    </div>

    <div class="card">

        <div class="card-block">

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


