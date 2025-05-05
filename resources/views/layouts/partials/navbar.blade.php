<nav class="z-50 w-full bg-black">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-white hover:text-gray-400">
                Carvan
            </a>
        </div>

        <div class="hidden sm:flex items-center space-x-20">
            <a href="{{ route('cars.index') }}" class="text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105 mr-0">
                Cars
            </a>
            <a href="{{ route('brands.index') }}" class="text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                Brands
            </a>
            <a href="{{ route('ranges.index') }}" class="text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                Range of Cars
            </a>
            <a href="{{ route('about') }}" class="text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                About Us
            </a>
            <a href="{{ route('contact') }}" class="text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                Contact
            </a>
        </div>

        <div class="flex items-center space-x-3 flex-shrink-0">

            <span class="w-16 h-6"></span>

        </div>

    </div>
</nav>

