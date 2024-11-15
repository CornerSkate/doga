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
    <h1>Könyvek</h1>

    <!-- Szűrőform -->
    <form action="{{ route('books.index') }}" method="GET">
        <div class="form-group">
            <label for="search">Keresés</label>
            <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Könyv cím, szerző, műfaj, kiadás éve">
        </div>
        <button type="submit" class="btn btn-secondary">Szűrés</button>
    </form>

    <div class="mt-4">
        <h3>Könyvek listája</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Könyv címe</th>
                    <th>Szerző</th>
                    <th>Kiadás éve</th>
                    <th>Akciók</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>
                            <a href="{{ route('books.book', $book->id) }}" class="btn btn-primary">Kölcsönzés</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $books->links() }} <!-- Pagináció -->
@endsection

</body>
</html>