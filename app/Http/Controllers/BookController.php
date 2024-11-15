<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $req){
        $request->validate(
            [
                'id' => 'required|integer|exists:id',
                'bookname' => 'required|string|max:255',
                'bookauthor' => 'required|string|max:255',
                'bookgenre' => 'required|string|max:255',
                'bookdate' => 'required|date',

            ],
        );

        Genre::create(
            [
                'bookgenre' => $req->bookgenre,
            ]);

            return redirect()->back()->with('success', 'Question stored.');

        
    }
}
