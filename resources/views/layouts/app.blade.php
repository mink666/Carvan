<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Carvan')</title>
</head>

<body>
    <div class="wrapper">
        <header>
            @include('layouts.partials.navbar')
            <div x-data="{ navbarHeight: 0 }"
                x-init="
                    const navbarEl = document.querySelector('nav.fixed.z-50'); // Selector chính xác của navbar
                    if (navbarEl) {
                        navbarHeight = navbarEl.offsetHeight;
                        document.documentElement.style.setProperty('--navbar-height', `${navbarHeight}px`);}"
                :style="`height: ${navbarHeight}px`"
                style="display: block;"
            ></div>
        </header>

        <div class="content">
            @yield('content')
        </div>

        <footer class="bg-white dark:bg-black">
            @include('layouts.partials.footer')
        </footer>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</body>

</html>
