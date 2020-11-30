<div class="form-group">
    <label for="category">Categorie</label>
    <select class="custom-select" name="category" id="category" required>
        @foreach($categories as $category)
            <option {{ $category->id == old('category', $book->category_id) ? 'selected' : '' }}
                    value="{{ $category->id }}">{{$category->title}}</option>
        @endforeach
    </select>

    @error('category')
    <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="title">Titel</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror"
           id="title" name="title" value="{{ old('title', $book->title) }}">

    @error('title')
    <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="author">Auteur</label>
    <input type="text" class="form-control @error('author') is-invalid @enderror"
           id="author" name="author" value="{{ old('author', $book->author) }}">

    @error('author')
    <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="description">Beschrijving</label>
    <input type="text" class="form-control @error('description') is-invalid @enderror"
           id="description" name="description" value="{{ old('description', $book->description) }}">

    @error('description')
    <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="image">Afbeelding</label>
    <input type="text" class="form-control @error('image') is-invalid @enderror"
           id="image" name="image" value="{{ old('image', $book->image) }}">

    @error('image')
    <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>
