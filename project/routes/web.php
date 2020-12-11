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

Route::view('/', 'home');
Route::view('contact', 'contact');

Route::get('/books', 'App\Http\Controllers\BooksController@index');
Route::get('/books/create', 'App\Http\Controllers\BooksController@create');
Route::post('/books', 'App\Http\Controllers\BooksController@store');
Route::get('/books/{books}', 'App\Http\Controllers\BooksController@show');
Route::get('/books/{books}/edit', 'App\Http\Controllers\BooksController@edit');
Route::patch('/books/{books}', 'App\Http\Controllers\BooksController@update');
//Route::patch('/books/{id}', 'App\Http\Controllers\BooksController@updateDetails');

Route::get('/authors', 'App\Http\Controllers\AuthorsController@index');
Route::get('/authors/create', 'App\Http\Controllers\AuthorsController@create');
Route::post('/authors', 'App\Http\Controllers\AuthorsController@store');
Route::get('/authors/{authors}', 'App\Http\Controllers\AuthorsController@show');
Route::get('/authors/{authors}/edit', 'App\Http\Controllers\AuthorsController@edit');
Route::patch('/authors/{authors}', 'App\Http\Controllers\AuthorsController@update');
//Route::PATCH('/authors/{id}', 'App\Http\Controllers\AuthorsController@updateAuthor');
