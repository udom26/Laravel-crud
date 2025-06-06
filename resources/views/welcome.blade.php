<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First Page</title>
    <link href="{{ asset('build/assets/app-T1DpEqax.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background: linear-gradient(90deg, #e6e6fa 0%, #d1c4e9 100%);
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        }
        .welcome-card {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .welcome-title {
            font-size: 2rem;
            color: #333333;
        }
        .welcome-desc {
            margin-top: 1rem;
            color: #666666;
        }
        .btn-login {
            background-color: #6366f1;
            color: #fff;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 0.6rem 0;
            width: 150px;
            border: none;
        }
        .btn-login:hover {
            background-color: #4f46e5;
            color: #fff;
        }
        .btn-register {
            background-color: #f3f4f6;
            color: #6366f1;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 0.6rem 0;
            width: 150px;
            border: 1px solid #6366f1;
        }
        .btn-register:hover {
            background-color: #6366f1;
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background: linear-gradient(90deg, #e6e6fa 0%, hsl(261, 100%, 95%) 100%); box-shadow: 0 2px 4px rgba(0,0,0,0.04); margin-bottom: 1.5rem;">
        <div class="container">
            <a class="navbar-brand" href="#">MyApp</a>
        </div>
    </nav>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
        <div class="welcome-card text-center">
            <h1 class="welcome-title">First Page</h1>
            <div class="welcome-desc">
                Welcome to my app<br>
                Please log in or register to use it.
            </div>
            <div class="welcome-cta d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn btn-register">Register</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('build/assets/app-T1DpEqax.js') }}"></script>
</body>
</html>