<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
        }
        .centered-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            width: 350px;
        }
    </style>
</head>
<body>
<div class="centered-container">
    <div class="card shadow-sm p-4">
        <h3 class="text-center mb-4">Login</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('loginMatch') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" name="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" required autofocus />
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" 
                    class="form-control @error('password') is-invalid @enderror" required />
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-success w-100">Login</button>
        </form>
    </div>
</div>
</body>
</html>
