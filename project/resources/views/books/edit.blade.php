@extends('layout')

@section('title', 'Edit Details of '.$book->title)

@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-12">
            <h1>Edit Details of {{ $book->title }}</h1>
        </div>
        <form action="/books/{{ $book->id }}" method="POST" class="pb-5">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{ $book->title }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('title') }}</div>
            
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" value="{{ $book->isbn }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('isbn') }}</div>
        
            <div class="form-group">
                <label for="author">Author:</label>
                <select class="form-control"  name="author_id" id="author_id">
                <option>--Select Author--</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" 
                        @if($author->id === $book->author->id)
                        selected
                        @endif
                    >{{ $author->lastname }}, {{ $author->initials }} </option>
                @endforeach
                </select>
            </div>
            <div class="text-danger">{{ $errors->first('author') }}</div>

            <div class="form-group">
                <label for="pages">No. of Pages:</label>
                <input type="text" name="pages" value="{{ $book->pages }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('pages') }}</div>
            @csrf
            @method('PATCH')
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn btn-primary" href="/books" role="button">Back</a>
        </form>
    </div> 
</div>
@endsection