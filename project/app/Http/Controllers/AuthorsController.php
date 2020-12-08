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
        $averagebooks = Book::distinct('title');
        $numcountries = Author::distinct('country');
        
        return view('authors.authors', [
            'authors' => $authors,
            'books' => $books,
            'averagebooks' => $averagebooks,
            'numcountries' => $numcountries,
        ]);

    }

    public function authorDetails($id)
    {
        $authors = Author::find($id);
        $books =  Book::where('authors_id', $id)->get();

        return view('authors.show', [
            'authors' => $authors,
            'books' => $books,
        ]);
    }
}
