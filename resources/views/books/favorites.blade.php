@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <ul class="list-group list-group-flush">
                @forelse($favorites as $book)
                    <li class="list-group-item">
                        <p class="card-title">{{ $book->title }}</p>

                        <a href="{{ route('books.show', ['book' => $book]) }}" class="card-link">
                            Lees meer
                        </a>
                    </li>
                @empty
                    <li class="list-group-item text-center">
                        <em class="card-text">No books flagged as favorites yet</em>
                    </li>
                @endforelse
            </ul>
        </div>

        {{ $favorites->links() }}
    </div>
@endsection
