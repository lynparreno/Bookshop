@extends('layout')

@section('title', 'Details of '.$authors->lastname.', '.$authors->initials)

@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-12">
            <h1>Info of {{ $authors->lastname }}, {{ $authors->initials }}</h1>
        </div>
        <form action="" method="POST" class="pb-5">
            <div class="form-group">
                <label for="lastname">Author's Last Name:</label>
                <input type="text" name="lastname" value="{{ $authors->lastname }}" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label for="initials">Author's Initials:</label>
                <input type="text" name="initials" value="{{ $authors->initials }}" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" value="{{ $authors->age }}" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label for="country">Country of Origin:</label>
                <input type="text" name="country" value="{{ $authors->country }}" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label for="listbooks">List of Books Written:</label>
                <ul>
                    @foreach($books as $book)
                        <li>{{ $book->title }}</li>
                    @endforeach
                </ul>    
            </div>

            @csrf
            <a class="btn btn-primary" href="/authors" role="button">Back</a>
        </form>
    </div> 
</div>
@endsection