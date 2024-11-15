<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'email', 'borrowed_date', 'return_date'];

    // Kapcsolat a könyvvel
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
