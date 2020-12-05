<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorsController extends Controller
{
    public function listAuthors()
    {
        $books = Book::all();
        $authors = Author::orderBy('lastname', 'ASC')->simplePaginate(50);
        
        return view('authors.authors', [
            'authors' => $authors,
            'books' => $books,
        ]);

    }
}
