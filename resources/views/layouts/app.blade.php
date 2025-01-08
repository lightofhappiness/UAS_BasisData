<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <!-- Your navigation here -->
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Your footer content here -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
