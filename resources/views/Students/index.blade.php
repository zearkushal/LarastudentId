<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container my-5">
         <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>
        <h1>Welcome, {{Auth::user()->name}}</h1>
          @if (session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <div class="list-group-item">
                        <a href="/students/create">Create</a>
                    </div>
                       <div class="list-group-item">
                        <a href="/students/read">Read</a>
                    </div>
                       
                       
                </div>
            </div>
        </div>
    </div>
</body>
</html>