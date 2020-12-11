@extends('layout')

@section('title', 'Add New Book')

@section('content')
   <div class="row">
      <div class="col-12">
         <h1 class="pt-4">Add New Book</h1>
      </div>
   </div>

   <div class="row">
      <div class="col-12">
         <form action="/books" method="POST" class="pb-5">
            <div class="form-group">
               <label for="title">Title:</label>
               <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('title') }}</div>

            <div class="form-group">
               <label for="isbn">ISBN:</label>
               <input type="text" name="isbn" value="{{ old('isbn') }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('isbn') }}</div>

            <div class="form-group">
            <label for="author">Author:</label>
            <select class="form-control" id="authors_id" name="authors_id">
               <option value="">--Select Author--</option>
                  @foreach($authors as $author)
                     <option value="{{ $author->id }}">{{ $author->lastname }}, {{ $author->initials }} </option> 
                  @endforeach
            </select>
         </div>

            <div class="form-group">
               <label for="pages">No. of Pages:</label>
               <input type="text" name="pages" value="{{ old('pages') }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('pages') }}</div>
            @csrf
            <button class="btn btn-primary" type="submit">Save</button>
            <a class="btn btn-primary" href="/books" role="button">Back</a>
      
         </form>
      </div>
   </div>
@endsection
