@extends('layouts.app')


@section('content')
<div class="container">
    <div>
        <a href="{{route('books')}}">
            terug
        </a>
    </div>


    <div class="container">
    @if($book)
       <div class="row">
           <div class="col-lg">
               <img src="{{$book['image']}}" alt="{{$book['title']}}">
           </div>
           <div class="col-lg">
               <header>
                   @if($book)
                       <h1>{{$book['title']}}</h1>
                   @else
                       <h1>{{$error}}</h1>
                   @endif
               </header>
               <p>{{$book['author']}}</p>
               <p>{{$book['description']}}</p>
               <button class="btn-primary btn-block">Voeg toe aan leeslijst</button>
           </div>
       </div>
        @endif
    </div>

    <div class="container">
        <ul class="border">
        @foreach ($book->comments as $comment)
            <div class="container">
                {{$comment->body}}
                {{$comment->created_at->toFormattedDateString()}}
                {{$comment->user->name}}
            </div>
        @endforeach
        </ul>
    </div>

    <div class="container">
        <div>
            <form method="POST" action="/books/{{ $book->id }}/comments">
                @csrf
                <div class="form-group">
                    <input placeholder="your comment here." type="text" class="form-control" id="body" name="body"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-primary btn-block">Comment</button>
                </div>
                <input type="hidden" name="book_id" value="{{$book->id}}">
            </form>
        </div>
    </div>
</div>
@endsection


