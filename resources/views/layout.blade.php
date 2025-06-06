<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background: linear-gradient(90deg, #e6e6fa 0%, hsl(279, 100%, 92%) 100%); box-shadow: 0 2px 4px rgba(0,0,0,0.04); margin-bottom: 1.5rem;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#" style="color: #000000;">MyApp</a>
        <div class="ms-auto d-flex align-items-center">
            <a href="{{ route('index') }}" class="btn btn-outline-primary me-2">Airports</a>
            <a href="{{ route('flights.index') }}" class="btn btn-outline-success me-2">Flights</a>
            <a href="{{ route('tickets.index') }}" class="btn btn-outline-warning me-2">Tickets</a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</nav>

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-+0n0xVW2eSR5O3z4z5a5b5a5b5a5b5a5b5a5b5a5b5a" crossorigin="anonymous"></script>
</body>
</html>