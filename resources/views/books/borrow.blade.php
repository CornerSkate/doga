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
        <h1>{{ $book->title }} - Kölcsönzés</h1>
        <p><strong>Szerző:</strong> {{ $book->author }}</p>
        <p><strong>Műfaj:</strong> {{ $book->genre->name }}</p>
        <p><strong>Kiadás éve:</strong> {{ $book->publication_year }}</p>

        <form action="{{ route('books.borrow', $book->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email cím</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="borrowed_date">Kölcsönzés dátuma</label>
                <input type="date" name="borrowed_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Könyv kölcsönzése</button>
        </form>
    </div>
@endsection
    
</body>
</html>