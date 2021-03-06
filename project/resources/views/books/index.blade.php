@extends('layout')

@section('title', 'List of Available Books')

@section('content')
   <div class="row">
      <div class="col-12">
         <h1 class="pt-4">Available Books</h1>
      </div>
   </div>
   <div class="row pb-4">
      <div class="col-12 d-flex justify-content-end">
         <a class="btn btn-primary" href="/books/create" role="button">Add New Book</a>
      </div>
   </div>

   <div class="row">
      <div class="col-12">
         <table class="table table-striped">
            <thead>
            <tr class="table-primary">
               <th>ISBN</th>
               <th>Title</th>
               <th>Author</th>
               <th></th>
            </tr>
            </thead>
            <tbody>
               @foreach($books as $book)
               <tr>
                  <td>{{ $book->isbn }}</td>
                  <td><a href="/books/{{ $book->id }}">{{ $book->title }}</td>
                  <td><a href="/authors/{{$book->author_id}}">{{ $book->author->full_name }}</td>
                  <td><a href="/books/{{$book->id}}/edit">Edit</td>
               </tr>
               @endforeach
            </tbody>
         </table>
         
         <div class="row">
            <div class="col-12 text-left">
               {{ $books->links() }}
            </div>
         </div>
      </div>
   </div>
      

@endsection
