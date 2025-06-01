<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <title>ID Card Generator</title>
</head>

<body>
    <div class="container my-5">
<div class="d-flex justify-content-end">
            <a href="{{ route('logout') }}" class="btn btn-danger mb-3">Logout</a>
        </div>
        <div class="row">
            <!-- Sidebar -->
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

            <!-- Main Form -->
            <div class="col-md-8">

                <div class="card card-default">
                    <div class="card-header">
                        View ID Card
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Roll No</th>
                                    <th>Date of Birth</th>
                                    <th>Card Expiry Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/'.$student->photo)}}" alt="" width="100px" height="50px">
                                    </td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->address}}</td>
                                    <td>{{$student->rollno}}</td>
                                    <td>{{$student->dob}}</td>
                                    <td>{{$student->expiry_date}}</td>
                                    <td>
                                        <a href="/students/{{$student->id}}/show" class="btn btn-primary btn-sm text-white">View</a>
                                        <form action="/students/{{$student->id}}/delete" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        <!-- <a href="" class="btn btn-danger btn-sm text-white">Delete</a> -->

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>