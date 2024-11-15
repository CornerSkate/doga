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

require __DIR__.'/auth.php';
