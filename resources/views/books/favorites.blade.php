@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @forelse($favorites as $favorite)
                <li>{{ $favorite->book->title }}</li>
            @empty
                <li><em class="text-muted">No books flagged as favorites yet</em></li>
            @endforelse
        </ul>
    </div>
@endsection
