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
        <!-- Logout aligned top-right -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>

        <h1>Welcome, {{ Auth::user()->name }}</h1>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="list-group">
                    <div class="list-group-item"><a href="/students/create">Create</a></div>
                    <div class="list-group-item"><a href="/students/read">Read</a></div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-6 mx-auto mt-4 text-end">
                <!-- Print Button -->
                <div class="text-end mb-3">
                    <button class="btn btn-outline-primary" onclick="printCard()">🖨️ Print ID Card</button>
                </div>

                <!-- ID Card -->
                <div id="printableCard" class="card shadow rounded-3" style="width: 350px; border: 2px solid #0d6efd;">
                    <div class="card-header text-center bg-primary text-white fw-bold">
                        SCHOOL ID CARD
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo"
                                class="img-thumbnail rounded-circle"
                                style="width: 120px; height: 120px; object-fit: cover;">
                        </div>

                        <h5 class="fw-bold text-uppercase">{{ $student->name }}</h5>
                        <p class="mb-1"><strong>Roll No:</strong> {{ $student->rollno }}</p>
                        <p class="mb-1"><strong>DOB:</strong> {{ \Carbon\Carbon::parse($student->dob)->format('d M Y') }}</p>
                        <p class="mb-1"><strong>Expiry:</strong> {{ \Carbon\Carbon::parse($student->expiry_date)->format('d M Y') }}</p>
                        <p class="mb-0"><strong>Address:</strong> {{ $student->address }}</p>
                    </div>
                    <div class="card-footer text-center small text-muted">
                        Issued by Kushal Dhamala
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Script -->
    <script>
        function printCard() {
            const cardHtml = document.getElementById('printableCard').outerHTML;
            const printWindow = window.open('', '', 'height=600,width=400');

            printWindow.document.write(`
                <html>
                    <head>
                        <title>Print ID Card</title>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
                        <style>
                            body { margin: 20px; text-align: center; }
                            .card { border: 2px solid #0d6efd; width: 350px; margin: auto; }
                            .card-body img { width: 120px; height: 120px; object-fit: cover; border-radius: 50%; }
                            .card-footer { font-size: 0.8rem; color: #6c757d; }
                        </style>
                    </head>
                    <body>
                        ${cardHtml}
                    </body>
                </html>
            `);

            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
</body>

</html>
