<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('images/CarVanLogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Carvan Admin</title>
</head>

<body>
    <div class="min-h-screen flex bg-gray-100">

        <!-- Sidebar -->
        <aside class="w-64 bg-white text-black shadow-md flex-shrink-0 min-h-screen">
            <div class="flex items-center justify-center py-6">
                <img src="{{ asset('images/CarVanlogo.png') }}" alt="CarVan Icon" class="h-16 w-16">
            </div>
            <nav class="space-y-1 px-4">
                <a href="/Admin/Dashboard"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/Admin/UserMgr?state=list"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-user-cog"></i>
                    <span>User</span>
                </a>
                <a href="/Admin/CarMgr?state=list"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-car-side"></i>
                    <span>Car</span>
                </a>
                <a href="/Admin/BrandMgr?state=list"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-building"></i>
                    <span>Brand</span>
                </a>
                <a href="/Admin/EventMgr?state=list"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-newspaper"></i>
                    <span>Event</span>
                </a>
                <a href="/Admin/RangesMgr?state=list"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-car"></i>
                    <span>Range</span>
                </a>
                <a href="#"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-edit"></i>
                    <span>Forms</span>
                </a>
                <a href="#"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-file-alt"></i>
                    <span>Report</span>
                </a>
                <a href="#"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-chart-line"></i>
                    <span>Charts</span>
                </a>
                <a href="#"
                class="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-icons"></i>
                    <span>Icons</span>
                </a>
            </nav>
        </aside>

        <!-- Content -->
            <main class="flex-1 p-6 overflow-y-auto">
                @if($section === 'Dashboard')
                    @include('Components/Dashboard')
                @elseif($section === 'CarMgr')
                    @if($state === 'list')
                        @include('Components/CarMgr/List', $data)
                    @elseif($state === 'create')
                        @include('Components/CarMgr/Create', $data)
                    @elseif($state === 'edit')
                        @include('Components/CarMgr/Edit', $data)
                    @endif
                @elseif($section === 'UserMgr')
                    @if($state === 'list')
                        @include('Components/UserMgr/List', $data)
                    @elseif($state === 'create')
                        @include('Components/UserMgr/Create', $data)
                    @elseif($state === 'edit')
                        @include('Components/UserMgr/Edit', $data)
                    @endif
                @elseif($section === 'BrandMgr')
                    @if($state === 'list')
                        @include('Components/BrandMgr/List', $data)
                    @elseif($state === 'create')
                        @include('Components/BrandMgr/Create', $data)
                    @elseif($state === 'edit')
                        @include('Components/BrandMgr/Edit', $data)
                    @endif
                @elseif($section === 'RangesMgr')
                    @if($state === 'list')
                        @include('Components/RangesMgr/List', $data)
                    @elseif($state === 'create')
                        @include('Components/RangesMgr/Create', $data)
                    @elseif($state === 'edit')
                        @include('Components/RangesMgr/Edit', $data)
                    @endif
                @elseif($section === 'EventMgr')
                    @if($state === 'list')
                        @include('Components/EventMgr', $data)
                    @elseif($state === 'create')
                        @include('Components/EventMgr/Create', $data)
                    @elseif($state === 'edit')
                        @include('Components/EventMgr/Edit', $data)
                    @endif
                @else
                    <h1 class="text-2xl font-semibold text-gray-700 mb-6">Page Not Found</h1>
                @endif
            </main>
      </div>
</body>

</html>

