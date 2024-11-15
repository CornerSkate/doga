<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = ['book_id', 'email', 'borrowed_date', 'return_date'];

    // Kapcsolat a könyv modellhez
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

