@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="my-3">
            <div class="dropdown">
                <button type="button" class="btn btn-secondary dropdown-toggle"
                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    @isset($category)
                        {{ $category->title }}
                    @else
                        Categorieën
                    @endif
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('books.index') }}">Alle</a>

                    @foreach($categories as $category)
                        <a class="dropdown-item" href="{{ route('categories.show', ['category' => $category]) }}">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="row justify-content-center">
            @forelse($books as $book)
                <div class="col col-sm-6 col-xl-3">
                    <article class="card text-center mb-3">
                        <img src="{{ $book->image }}" alt="{{ $book->title }}"
                             class="card-img bg-light">

                        <section class="card-body">
                            <h2 class="card-title">{{$book->title}}</h2>

                            <p class="card-text">{{$book->author}}</p>
                            <p class="card-text">{{$book->category->title}}</p>

                            <a class="btn btn-secondary text-nowrap" href="{{route('books.show', $book->id)}}">
                                Lees meer
                            </a>

                            @if($favorites->contains($book->id))
                                <form class="d-inline" method="POST"
                                      action="{{ route('favorites.destroy', ['book' => $book]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Unfavorite</button>
                                </form>
                            @else
                                <form class="d-inline" method="POST"
                                      action="{{ route('favorites.update', ['book' => $book]) }}">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" class="btn btn-primary">Favoriet</button>
                                </form>
                            @endif
                        </section>
                    </article>
                </div>
            @empty
                <div class="col">
                    <div class="card">
                        <div class="card-body text-center">
                            <em class="card-text">No books found</em>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
