
@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p><strong>Szerző:</strong> {{ $book->author }}</p>
    <p><strong>Műfaj:</strong> {{ $book->genre->name }}</p>
    <p><strong>Kiadás éve:</strong> {{ $book->publication_year }}</p>

    <h3>Kölcsönzés</h3>

    <!-- Kölcsönzés form -->
    <form action="{{ route('book.borrow', $book->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email cím</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="borrowed_date">Kölcsönzés dátuma</label>
            <input type="date" id="borrowed_date" name="borrowed_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Könyv kölcsönzése</button>
    </form>
@endsection
