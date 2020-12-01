<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function listBooks()
    {
        //$booklist = Book::all();
        $booklist = Book::orderBy('title', 'ASC')->simplePaginate(50);


        return view('books.books', [
            'books' => $booklist,
        
        ]);

    }

    public function store()
    {

        $data = request()->validate([
            'title' => 'required|min:3',
            'isbn' => 'required|digits:8',
            'author' => 'required',
            'pages' => 'required'
        ]);
        
        Book::create($data);

        return redirect('/books')->with('success', 'Item has been successfully added in the database');
    }

    public function showDetails($id){
        $books = Book::find($id);
        //$books = Book::all();
        return view('books.show', [
            'books' => $books,
        ]);
    }
}
