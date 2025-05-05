<nav class="z-50 w-full bg-black">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <div class="flex items-center space-x-4 sm:space-x-6">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-white hover:text-gray-200">
                Carvan
            </a>
            <div class="hidden sm:flex items-center space-x-4">
                <a href="{{ route('cars.index') }}" style="margin-right: 0" class="text-sm font-bold text-white hover:text-gray-200">
                    Cars
                </a>
                <a href="{{ route('brands.index') }}" class="text-sm font-bold text-white hover:text-gray-200">
                    Brands
                </a>
                <a href="{{ route('ranges.index') }}" class="text-sm font-bold text-white hover:text-gray-200">
                    Range of Cars
                </a>
                <a href="{{ route('about') }}" class="text-sm font-bold text-white hover:text-gray-200">
                    About Us
                </a>
                <a href="{{ route('contact') }}" class="text-sm font-bold text-white hover:text-gray-200">
                    Contact
                </a>
            </div>
        </div>

        {{-- <div class="flex items-center space-x-3">
            @guest
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 bg-white hover:text-white px-3 py-1 rounded-md hover:bg-gray-700">
                    Log In
                </a>
                <a href="{{ route('register') }}" class="text-sm font-medium text-white bg-gray-700 px-3 py-1 rounded-md hover:bg-white hover:text-gray-700">
                    Sign Up
                </a>
            @endguest

            @auth
                <span class="hidden sm:inline text-sm font-semibold text-gray-700">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 px-3 py-1 rounded-md hover:bg-red-50">
                        Log Out
                    </button>
                </form>
            @endauth
        </div> --}}
</nav>
