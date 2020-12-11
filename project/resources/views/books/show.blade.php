@extends('layout')

@section('title', 'Details of '.$book->title)

@section('content')
<div class="row">
   <div class="col-12">
   <form action="" method="POST" class="pb-5">
         <div class="col-12">
            <h1>Info of {{ $book->title }}</h1>
         </div>
         <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ $book->title }}" class="form-control" disabled>
         </div>
         
         <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" value="{{ $book->isbn }}" class="form-control" disabled>
         </div>
      
         <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="authors" value="{{ $book->author->lastname }}, {{ $book->author->initials }}" class="form-control" disabled>
         </div>

         <div class="form-group">
            <label for="pages">No. of Pages:</label>
            <input type="text" name="pages" value="{{ $book->pages }}" class="form-control" disabled>
         </div>
         @csrf
         <a class="btn btn-primary" href="/books" role="button">Back</a>
      </form>
   </div> 
</div>
@endsection