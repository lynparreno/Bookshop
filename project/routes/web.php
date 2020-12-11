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
Route::get('/books/{book}', 'App\Http\Controllers\BooksController@show');
Route::get('/books/{book}/edit', 'App\Http\Controllers\BooksController@edit');
Route::patch('/books/{book}', 'App\Http\Controllers\BooksController@update');

Route::get('/authors', 'App\Http\Controllers\AuthorsController@index');
Route::get('/authors/create', 'App\Http\Controllers\AuthorsController@create');
Route::post('/authors', 'App\Http\Controllers\AuthorsController@store');
Route::get('/authors/{author}', 'App\Http\Controllers\AuthorsController@show');
Route::get('/authors/{author}/edit', 'App\Http\Controllers\AuthorsController@edit');
Route::patch('/authors/{author}', 'App\Http\Controllers\AuthorsController@update');
