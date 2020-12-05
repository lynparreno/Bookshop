@extends('layout')

@section('title', 'Edit Books')

@section('content')
<div class="row">
      <div class="col-12">
         <form action="" method="GET" class="pb-5">
            <div class="form-group">
               <label for="title">Title:</label>
               <input type="text" name="title" value="{{ $books->title }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('title') }}</div>

            <div class="form-group">
               <label for="isbn">ISBN:</label>
               <input type="text" name="isbn" value="{{ $books->isbn }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('isbn') }}</div>

            <div class="form-group">
               <label for="author">Author:</label>
               <select class="form-control"  name="authors_id" id="authors_id">
                  <option>--Select Author--</option>
                  @foreach($authors as $author)
                     <option value="{{ $author->id }}" 
                        @if($author->id === $books->authors->id)
                        selected
                        @endif
                     >{{ $author->lastname }}, {{ $author->initials }} </option>
                  @endforeach
               </select>
            </div>
            <div class="text-danger">{{ $errors->first('author') }}</div>

            <div class="form-group">
               <label for="pages">No. of Pages:</label>
               <input type="text" name="pages" value="{{ $books->pages }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('pages') }}</div>

            <button class="btn btn-primary" type="submit">Update</button>
            @csrf
            @method('PATCH')
         </form>
      </div>
   </div>
@endsection