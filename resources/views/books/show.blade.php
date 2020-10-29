@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <a href="{{route('books')}}">
            terug
        </a>
    </div>

    <div class="container m-2">
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
               @can('admin')
               <button class="btn-secondary btn-block">
                   <a class="disabled" href="{{ route('books.edit',$book->id)}}">Edit</a>
               </button>

                   <form class="mt-2" action="{{ route('books.destroy', $book->id)}}" method="post">
                       @csrf
                       @method('DELETE')
                       <button class="btn-danger btn-block" type="submit">Delete</button>
                   </form>




               @endcan
           </div>
       </div>
        @endif
    </div>

    <div class="container">

        @foreach ($book->comments as $comment)
            <div class="container border rounded p-2 m-1">
                {{$comment->body}}
                {{$comment->created_at->toFormattedDateString()}}
                {{$comment->user->name}}
            </div>
        @endforeach

    </div>

    <div class="container">
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
@endsection


