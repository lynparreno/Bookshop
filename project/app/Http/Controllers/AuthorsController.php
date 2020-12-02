<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorsController extends Controller
{
    public function listAuthors()
    {
        //$booklist = Book::all();
        $authors = Author::orderBy('author', 'ASC')->simplePaginate(50);


        return view('authors.authors', [
            'authors' => $authors,
        
        ]);

    }
}
