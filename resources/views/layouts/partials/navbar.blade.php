<nav class="z-50 w-full bg-white">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}">
            <img src="{{ asset('images/CarVanLogo.png') }}" alt="Carvan Logo" class="h-12 w-14">
            </a>
        </div>

        <div class="hidden sm:flex items-center space-x-6 md:space-x-8 lg:space-x-10 xl:space-x-12 2xl:space-x-20">
            <a href="{{ route('preOwned.index') }}"
                class="mr-0 text-sm font-bold text-black hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                Pre-Owned Cars
            </a>

            @if (isset($brandsWithModelsForNavbar) && $brandsWithModelsForNavbar->count() > 0)
                <x-mega-menu-dropdown triggerText="Brands" :items="$brandsWithModelsForNavbar" itemType="brand"
                    activeTabInitial="{{ $brandsWithModelsForNavbar->first()->id ?? '' }}" />
            @else
                <a href="{{ route('brands.index') }}"
                    class="text-sm font-bold text-black hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                    Brands
                </a>
            @endif

            @if (isset($rangesWithModelsForNavbar) && $rangesWithModelsForNavbar->count() > 0)
                <x-mega-menu-dropdown triggerText="Range of Cars" :items="$rangesWithModelsForNavbar" itemType="range"
                    activeTabInitial="{{ $rangesWithModelsForNavbar->first()->id ?? '' }}" />
            @else
                <a href="{{ route('range_of_car.index') }}"
                    class="text-sm font-bold text-black hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                    Range of Cars
                </a>
            @endif

            <a href="{{ route('about') }}"
                class="text-sm font-bold text-black hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                About Us
            </a>
            <a href="{{ route('contact') }}"
                class="text-sm font-bold text-black hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                Contact
            </a>
            <a href="{{ route('news_events.index') }}"
                class="text-sm font-bold text-black hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                News & Events
            </a>
        </div>

        <div class="flex items-center space-x-3 flex-shrink-0">
            {{-- place holder --}}
        </div>

    </div>
</nav>
