<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <h1>Új könyv hozzáadása</h1>

    <!-- Hibák megjelenítése -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Könyv hozzáadása form -->
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Könyv címe</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="author">Szerző</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}" required>
        </div>

        <div class="form-group">
            <label for="genre_id">Műfaj</label>
            <select name="genre_id" id="genre_id" class="form-control" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="publication_year">Kiadás éve</label>
            <input type="number" id="publication_year" name="publication_year" class="form-control" value="{{ old('publication_year') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Könyv hozzáadása</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
@endsection

</body>
</html>