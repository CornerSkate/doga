<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'author', 'genre_id', 'publication_year'];

    // Kapcsolat a műfajok táblával
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}

