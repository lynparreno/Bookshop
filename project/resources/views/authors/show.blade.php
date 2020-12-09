@extends('layout')

@section('title', 'Author Details')

@section('content')
<div class="row">
    <div class="col-12">
        <form action="" method="POST" class="pb-5">
            <div class="form-group">
                <label for="lastname">Author's Last Name:</label>
                <input type="text" name="lastname" value="{{ $authors->lastname }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('lastname') }}</div>

            <div class="form-group">
                <label for="initials">Author's Initials:</label>
                <input type="text" name="initials" value="{{ $authors->initials }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('initials') }}</div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" value="{{ $authors->age }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('age') }}</div>

            <div class="form-group">
                <label for="country">Country of Origin:</label>
                <input type="text" name="country" value="{{ $authors->country }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('country') }}</div>

            <div class="form-group">
                <label for="listbooks">List of Books Written:</label>
                <ul>
                    @foreach($books as $book)
                        <li>{{ $book->title }}</li>
                    @endforeach
                </ul>    
            </div>

            @csrf
            @method('PATCH')
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div> 
</div>
@endsection