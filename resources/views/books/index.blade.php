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
<h1>Könyvek listája</h1>

@if($books->isEmpty())
    <p>Nincsenek elérhető könyvek.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Cím</th>
                <th>Szerző</th>
                <th>Műfaj</th>
                <th>Kiadás éve</th>
                <th>Akciók</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre->name }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">Részletek</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Törlés</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection

</body>
</html>