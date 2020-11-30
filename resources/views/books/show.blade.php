@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-3">
            <a class="btn btn-secondary" href="{{ route('books.index') }}">
                terug
            </a>
        </div>

        <div class="row my-3">
            <div class="col-lg">
                <img src="{{ $book->image }}" alt="{{ $book->title }}">
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


                @if($isFavorite)
                    <form method="POST" action="{{ route('favorites.destroy', ['book' => $book]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-block">Unfavorite</button>
                    </form>
                @else
                    <form method="POST" action="{{ route('favorites.update', ['book' => $book]) }}">
                        @csrf
                        @method('PUT')

                        <button type="submit" class="btn btn-primary btn-block">Voeg toe aan leeslijst</button>
                    </form>
                @endif

                @can('admin')
                    <a class="btn btn-secondary btn-block mt-2" href="{{ route('books.edit',$book->id) }}">
                        Edit
                    </a>

                    <form class="mt-2" action="{{ route('books.destroy', $book->id)}}" method="POST"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-block" type="submit">Delete</button>
                    </form>
                @endcan
            </div>
        </div>

        <hr>

        @if($book->comments->isNotEmpty())
            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @foreach ($book->comments as $comment)
                        <li class="list-group-item">
                            <p class="card-text">{{ $comment->body }}</p>

                            <p class="m-0 card-text small text-muted">
                                {{ $comment->created_at->toFormattedDateString() }}
                                &bull;
                                {{ $comment->user->name }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('books.comments.store', ['book' => $book]) }}" method="POST">
            @csrf
            <div class="form-group">
                <input placeholder="your comment here." type="text" class="form-control" id="body" name="body"/>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Comment</button>
            </div>
        </form>
    </div>
@endsection


