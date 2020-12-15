<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function scopeAuthorId($query, $author)
    {
        return $query->where('author_id', $author->id);
    }
}
