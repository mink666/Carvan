{{-- Giả sử file này là resources/views/navbar.blade.php --}}
{{-- Hoặc resources/views/partials/navbar.blade.php nếu bạn @include('partials.navbar') --}}
{{-- Các biến $brandsWithModelsForNavbar và $rangesWithModelsForNavbar được cung cấp bởi ViewComposer --}}

<nav class="z-50 w-full bg-black">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-white hover:text-gray-400">
                Carvan
            </a>
        </div>

        {{-- Main navigation links - Giảm space-x để có thêm không gian cho các mục mới nếu cần --}}
        <div class="hidden sm:flex items-center space-x-6 md:space-x-8 lg:space-x-10 xl:space-x-12 2xl:space-x-20">
            <a href="{{ route('car_models.index') }}" class="mr-0 text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                Cars
            </a>

            {{-- Brands Dropdown --}}
            @if(isset($brandsWithModelsForNavbar) && $brandsWithModelsForNavbar->count() > 0)
                <x-mega-menu-dropdown
                    triggerText="Brands"
                    :items="$brandsWithModelsForNavbar"
                    itemType="brand"
                    activeTabInitial="{{ $brandsWithModelsForNavbar->first()->id ?? '' }}"
                />
            @else
                {{-- Fallback link if no brands data or component fails --}}
                <a href="{{ route('brands.index') }}" class="text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                    Brands
                </a>
            @endif

            {{-- Range of Cars Dropdown --}}
            @if(isset($rangesWithModelsForNavbar) && $rangesWithModelsForNavbar->count() > 0)
                <x-mega-menu-dropdown
                    triggerText="Range of Cars"
                    :items="$rangesWithModelsForNavbar"
                    itemType="range"
                    activeTabInitial="{{ $rangesWithModelsForNavbar->first()->id ?? '' }}"
                />
            @else
                {{-- Fallback link if no range data or component fails --}}
                <a href="{{ route('range_of_car.index') }}" class="text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                    Range of Cars
                </a>
            @endif

            <a href="{{ route('about') }}" class="text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                About Us
            </a>
            <a href="{{ route('contact') }}" class="text-sm font-bold text-white hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                Contact
            </a>
        </div>

        <div class="flex items-center space-x-3 flex-shrink-0">
            {{-- place holder --}}
        </div>

    </div>
</nav>
