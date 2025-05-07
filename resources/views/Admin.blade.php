<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('images/CarVanLogo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/2577a97aef.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Carvan Admin</title>
</head>
<body>
    <div class="min-h-screen flex bg-gray-100">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md flex-shrink-0">
            <img src="{{ asset('images/CarVanlogo.png') }}" alt="CarVan Icon" class="h-24 w-24 mx-auto mt-4">
          <nav class="mt-4 text-gray-600">
            <a href="/Admin/Dashboard" class="block px-6 py-3 hover:bg-indigo-100 hover:text-indigo-600 transition font-medium">Dashboard</a>
            <a href="/Admin/UserMgr" class="block px-6 py-3 hover:bg-indigo-100 transition">
                User management
            </a>
            <a href="/Admin/CarMgr" class="block px-6 py-3 hover:bg-indigo-100 transition">
                Car management
            </a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">Forms</a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">Report</a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">Charts</a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">Icons</a>
          </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @if($section === 'Dashboard')
                @include('Components/Dashboard')
            @elseif($section === 'CarMgr')
                @include('Components/CarMgr')
            @elseif($section === 'UserMgr')
                @include('Components/UserMgr')
            @else
            <h1 class="text-2xl font-semibold text-gray-700 mb-6">Page Not Found</h1>
            @endif
        </main>
      </div>
</body>
</html>



