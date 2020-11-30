@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Books List</div>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-sm mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Category</th>
                                <th scope="col">Hide</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($books as $book)
                                <tr>
                                    <th scope="row">{{ $book->id }}</th>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->category->title }}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                   value="{{ $book->id }}" {{ $book->is_hidden ? 'checked' : '' }}
                                                   id="visibility-{{ $book->id }}" autocomplete="off">
                                            <label class="custom-control-label"
                                                   for="visibility-{{ $book->id }}"></label>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <em>No books found</em>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('.custom-control-input').on('change', function () {
                const $elem = $(this);
                const bookId = $elem.attr('value');
                const action = $elem.prop('checked') ? '/hidden' : '/visible';

                $.ajax({
                    type: "PUT",
                    dataType: "json",
                    url: '/books/' + bookId + action,
                    data: {_token: '{{ csrf_token() }}'}
                });
            });
        });
    </script>
@endsection
