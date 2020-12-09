@extends('layout')

@section('title', 'List of Authors')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="pt-4">List of Authors</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="bg-success text-light rounded">
                <div class="inner">
                    <h3 class="text-center">{{ round($averagebooks->avg('bookcount')) }}</h3>
                    <p class="text-center">Average Books Written</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="bg-warning text-light rounded">
                <div class="inner">
                    <h3 class="text-center">{{ round($ave_age->avg('age')) }}</h3>
                    <p class="text-center">Average Age</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="bg-primary text-light rounded">
                <div class="inner">
                    <h3 class="text-center">{{ $numcountries->count() }}</h3>
                    <p class="text-center">No. of Different Countries of Origin</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row pb-4">
        <div class="col-12 d-flex justify-content-end">
            <a class="btn btn-primary" href="#" role="button">Add New Author</a>
        </div>
        
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Author's Name</th>
                        <th>Age</th>
                        <th>Country of Origin</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                <tr>
                    <td><a href="/authors/{{ $author->id }}">{{ $author->lastname }}, {{ $author->initials }}</td>
                    <td>{{ $author->age }}</td>
                    <td>{{ $author->country }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                <div class="col-12 text-left">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
