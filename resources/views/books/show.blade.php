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

    <div class="comments_form">
        <form method="post" action="{{route('comments.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="title">
                @if ($errors->has('title'))
                    <span class="alert">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <input type="text" class="form-control" id="comment" name="comment">
                @if ($errors->has('comment'))
                    <span class="alert">{{$errors->first('comment')}}</span>
                @endif
            </div>
            <button type="submit" class="btn-primary btn-block">Comment Plaatsen</button>
        </form>
    </div>
@endsection


