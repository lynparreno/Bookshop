<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function listBooks()
    {
        //$booklist = Book::all();
        $booklist = Book::orderBy('title', 'ASC')->simplePaginate(50);
        $authors = Author::all();

        return view('books.books', [
            'books' => $booklist,
            'authors' => $authors,
        ]);

    }

    public function store()
    {

        $data = request()->validate([
            'title' => 'required|min:3',
            'isbn' => 'required|digits:8',
            'authors_id' => 'required',
            'pages' => 'required'
        ]);
        
        Book::create($data);
        return redirect('/books')->with('success', 'Item has been successfully added in the database');
    }

    public function showDetails($id)
    {
        $books = Book::find($id);
        $authors = Author::all();
        //$books = Book::all();
        return view('books.show', [
            'books' => $books,
            'authors' => $authors,
        ]);
    }

    public function updateDetails($id)
    {
        $books = Book::find($id);

        $books->isbn = request('isbn');
        $books->title = request('title');
        $books->authors_id = request('authors_id');
        $books->pages = request('pages');

        $books->save();
        return redirect('/books')->with('success', 'Item has been successfully updated');
    }
}
