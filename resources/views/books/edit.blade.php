@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="mb-3 pb-3 border-bottom">
            <h1>Edit Book</h1>

            <a class="btn btn-secondary" href="{{ route('books.index') }}">Terug naar overzicht</a>
        </header>

        <form method="POST" action="{{ route('books.update', ['book' => $book]) }}">
            @csrf
            @method('PUT')

            {{-- Include shared form partial with create view --}}
            @include('books.form', ['book' => $book])

            <hr>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save changes</button>
            </div>
        </form>
    </div>
@endsection
