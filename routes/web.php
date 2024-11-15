<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingController;

Route::get('new-genre', [GenreController::class, 'create'])->name('genre.create');
Route::post('new-genre', [GenreController::class, 'store'])->name('genre.store');

Route::get('new-book', [BookController::class, 'create'])->name('book.create');
Route::post('new-book', [BookController::class, 'store'])->name('book.store');

Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::get('books/book/{id}', [BookController::class, 'show'])->name('books.show');
Route::post('books/book/{id}/borrow', [BookingController::class, 'store'])->name('book.borrow');

Route::delete('books/{id}', [BookController::class, 'destroy'])->name('book.destroy');

// Create route: Megjeleníti az űrlapot a könyv hozzáadásához
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// Store route: A könyv adatainak mentésére szolgál a POST kérés
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Egyéb könyv route-ok (pl. listázás)
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Route a műfaj felvitelére (GET kérés, az űrlap megjelenítésére)
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');

// Route a műfajok mentésére (POST kérés, az űrlap adatainak feldolgozására)
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');

// Egyedi route a könyvek törlésére
Route::delete('books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');




require __DIR__.'/auth.php';
