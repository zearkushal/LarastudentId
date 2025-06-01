<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <!-- Top-right Logout Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>

        <h1>Welcome, {{ Auth::user()->name }}</h1>

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
                        Create ID Card
                    </div>
                    <div class="card-body">
                        <form action="/students/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="mb-3">
                                <label for="name" class="form-label">*Full Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">*Address</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
                                @if($errors->has('address'))
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="rollno" class="form-label">*Roll no</label>
                                <input type="text" name="rollno" class="form-control" id="rollno" value="{{ old('rollno') }}">
                                @if($errors->has('rollno'))
                                    <p class="text-danger">{{ $errors->first('rollno') }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">*Date of Birth</label>
                                <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}">
                                @if($errors->has('dob'))
                                    <p class="text-danger">{{ $errors->first('dob') }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="expiry_date" class="form-label">*Card Expiry Date</label>
                                <input type="date" name="expiry_date" class="form-control" id="expiry_date" value="{{ old('expiry_date') }}">
                                @if($errors->has('expiry_date'))
                                    <p class="text-danger">{{ $errors->first('expiry_date') }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">*Upload Photo</label>
                                <input type="file" name="photo" class="form-control" id="photo" accept="image/*">
                                @if($errors->has('photo'))
                                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Generate ID Card</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
