<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {

        $books = Book::orderBy('title', 'ASC')->simplePaginate(50);

        return view('books.index', compact('books'));

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
        return redirect('/books');

    }

    public function create()
    {
        $authors = Author::orderBy('lastname', 'ASC')->get(); 
        return view('books.create', compact('authors'));

    }

    public function show(Book $book)
    {
        $authors = Author::all();
        return view('books.show', compact('book', 'authors'));
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('lastname', 'ASC')->get();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Book $book)
    {
        
        $data = request()->validate([
            'title' => 'required|min:3',
            'isbn' => 'required|digits:8',
            'author_id' => 'required',
            'pages' => 'required'
        ]);

        $book->update($data);
        return redirect('/books/' . $book->id);
    }
}
