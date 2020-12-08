<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');

});

/*Route::get('/books/{id}', function () {
    return view('books.show');

});*/

//Route::get('books', 'App\Http\Controllers\BooksController@listBooks')->title('booklist');
Route::get('/books', 'App\Http\Controllers\BooksController@listBooks');
//Route::post('/books', 'App\Http\Controllers\BooksController@store');
Route::view('contact', 'contact');
//Route::view('/books/add', 'books/add');
Route::get('/add', 'App\Http\Controllers\BooksController@addBook');
Route::post('/add', 'App\Http\Controllers\BooksController@store');
Route::get('/books/{id}', 'App\Http\Controllers\BooksController@showDetails');
Route::PATCH('/books/{id}', 'App\Http\Controllers\BooksController@updateDetails');

Route::get('/authors', 'App\Http\Controllers\AuthorsController@listAuthors');
Route::get('/authors/{id}', 'App\Http\Controllers\AuthorsController@authorDetails');
//Route::view('books', 'books/books');

