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
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p><strong>Szerző:</strong> {{ $book->author }}</p>
        <p><strong>Műfaj:</strong> {{ $book->genre->name }}</p>
        <p><strong>Kiadás éve:</strong> {{ $book->publication_year }}</p>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">Vissza a könyvek listájához</a>
    </div>
@endsection

</body>
</html>