<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Book;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'borrowed_date' => 'required|date',
        ]);

        Booking::create([
            'book_id' => $id,
            'email' => $request->email,
            'borrowed_date' => $request->borrowed_date,
            'return_date' => null, // kezdetben nincs visszavitel
        ]);

        return redirect()->route('books.index')->with('success', 'A könyv sikeresen kölcsönözve lett!');
    }
}

