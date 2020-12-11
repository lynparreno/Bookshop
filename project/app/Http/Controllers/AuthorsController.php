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
                        ->groupBy('authors_id')
                        ->get(); 
        
        return view('authors.index', compact('books', 'authors', 'averagebooks', 'numcountries', 'ave_age'));
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

    public function show(Author $authors)
    {
        $books =  Book::where('authors_id', $authors->id)->get();
        return view('authors.show', compact('authors', 'books'));
    }

    public function edit(Author $authors)
    {
        $books =  Book::where('authors_id', $authors->id)->get();
        return view('authors.edit', compact('authors', 'books'));
    }

    public function update(Author $authors)
    {
        $data = request()->validate([
            'lastname' => 'required|min:3',
            'initials' => 'required',
            'age' => 'required|digits:2',
            'country' => 'required'
        ]);
        $authors->update($data);
        return redirect('/authors/' . $authors->id);
    }
}
