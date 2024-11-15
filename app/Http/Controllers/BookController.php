<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'publication_year' => 'required|digits:4',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Könyv sikeresen hozzáadva!');
    }

    public function index(Request $request)
    {
        $query = Book::query();

        // Szűrési lehetőségek
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->author . '%');
        }
        if ($request->has('genre')) {
            $query->where('genre_id', $request->genre);
        }
        if ($request->has('year')) {
            $query->where('publication_year', $request->year);
        }

        $books = $query->get();

        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->route('books.index')->with('success', 'Könyv törölve!');
    }
}

