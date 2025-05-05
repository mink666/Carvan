<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Carvan')</title>
</head>

<body>
    <div class="wrapper">
        <header>
            @include('layouts.partials.navbar')
        </header>

        <div class="content">
            @yield('content')
        </div>

        <footer>
            @include('layouts.partials.footer')
        </footer>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>


