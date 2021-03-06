<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Models\Book;

class AuthorsController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $authors = Author::orderBy('lastname', 'ASC')->simplePaginate(50);
        $ave_age = Author::all();
        $numcountries = Author::distinct('country');
        $averagebooks = DB::table('books')
                        ->select(DB::raw('count(title) as bookcount'))
                        ->whereNotNull('id')
                        ->groupBy('author_id')
                        ->get(); 
        $averagepagenum = DB::table('books')
                        ->leftjoin('authors', 'books.author_id', '=', 'authors.id')
                        ->select(DB::raw('avg(books.pages) as pagenum'))
                        ->groupBy('author_id')
                        ->orderBy('lastname', 'ASC')
                        ->get()
                        ->toArray();
        
        return view('authors.index', compact('books', 'authors', 'averagebooks', 'numcountries', 'ave_age', 'averagepagenum'));
    }

    public function create()
    {
        return view('authors.create');

    }

    public function store()
    {

        $data = request()->validate([
            'lastname' => 'required|min:3',
            'initials' => 'required',
            'age' => 'required|digits:2',
            'country' => 'required'
        ]);
        
        Author::create($data);
        return redirect('/authors');

    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        //$books =  Book::where('author_id', $author->id)->get();
        $books = Book::authorId($author)->get();
        return view('authors.edit', compact('author', 'books'));
    }

    public function update(Author $author)
    {
        $data = request()->validate([
            'lastname' => 'required|min:3',
            'initials' => 'required',
            'age' => 'required|digits:2',
            'country' => 'required'
        ]);
        $author->update($data);
        return redirect('/authors/' . $author->id);
    }
}
