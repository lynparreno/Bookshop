@extends('layout')

@section('title', 'List of Authors')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="pt-4">List of Authors</h1>
        </div>
    </div>
    <div class="row pb-4">
        <div class="col-6 d-flex justify-content-center">
            <a class="btn btn-primary" href="#" role="button">Add New Author</a>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Author's Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                <tr>
                    <td><a href="/authors/{{ $author->id }}">{{ $author->lastname }}, {{ $author->initials }}</td>
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
