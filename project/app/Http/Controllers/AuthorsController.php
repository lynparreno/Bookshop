<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Models\Book;

class AuthorsController extends Controller
{
    public function listAuthors()
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
        
        return view('authors.authors', [
            'authors' => $authors,
            'books' => $books,
            'averagebooks' => $averagebooks,
            'numcountries' => $numcountries,
            'ave_age' => $ave_age,
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

    public function updateAuthor($id)
    {
        $authors = Author::find($id);

        $authors->initials = request('initials');
        $authors->lastname = request('lastname');
        $authors->age = request('age');
        $authors->country = request('country');

        $authors->save();
        return redirect('/authors')->with('success', 'Item has been successfully updated');
    }
}
