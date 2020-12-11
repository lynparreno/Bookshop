@extends('layout')

@section('title', 'Add New Author')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-12">
            <h1>Add New Author</h1>
        </div>
        <form action="/authors" method="POST" class="pb-5">
            <div class="form-group">
                <label for="lastname">Author's Last Name:</label>
                <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('lastname') }}</div>

            <div class="form-group">
                <label for="initials">Author's Initials:</label>
                <input type="text" name="initials" value="{{ old('initials') }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('initials') }}</div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" value="{{ old('age') }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('age') }}</div>

            <div class="form-group">
                <label for="country">Country of Origin:</label>
                <input type="text" name="country" value="{{ old('country') }}" class="form-control">
            </div>
            <div class="text-danger">{{ $errors->first('country') }}</div>

            @csrf
            <button class="btn btn-primary" type="submit">Save</button>
            <a class="btn btn-primary" href="/books" role="button">Back</a>
        </form>
    </div> 
</div>
@endsection