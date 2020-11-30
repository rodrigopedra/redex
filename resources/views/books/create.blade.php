@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="mb-3 pb-3 border-bottom">
            <h1>Voeg een boek toe</h1>

            <a class="btn btn-secondary" href="{{ route('books.index') }}">Terug naar overzicht</a>
        </header>

        <form method="post" action="{{ route('books.store') }}">
            @csrf

            {{-- Include shared form partial with edit view --}}
            @include('books.form', ['book' => $book])

            <hr>

            <button type="submit" class="btn btn-primary btn-block">Boek Opslaan</button>
        </form>
    </div>
@endsection
