<<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Testing</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
   <div class="container">
      <table class="table table-striped">
         <thead>
         <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
         </tr>
         </thead>
         <tbody>
            @foreach($books as $booklist)
            <tr>
               <td>{{ $booklist->id }}</td>
               <td>{{ $booklist->title }}</td>
               <td>{{ $booklist->author }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
      <div class="row">
         <div class="col-24 text-center">
            {{ $books->links() }}
         </div>
      </div>
   </div>
</body>
</html>