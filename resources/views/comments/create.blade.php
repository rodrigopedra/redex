@section('content')
    <header>
        <h1>Voeg een comment toe</h1>
    </header>

    <div class="container">
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
