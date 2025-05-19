<nav x-data="{
        showNavbar: true,
        lastScrollTop: 0,
        scrollThreshold: 100
     }"
     x-init="
    lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
    let timeout;
    window.addEventListener('scroll', () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop && scrollTop > scrollThreshold) {
                showNavbar = false;
            } else if (scrollTop < lastScrollTop || scrollTop <= scrollThreshold) {
                showNavbar = true;
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, 50);
    }, { passive: true });
    "
     class="fixed top-0 left-0 w-full z-50 bg-white shadow-md transition-transform duration-700 ease-in-out"
     :class="{
        'translate-y-0 opacity-100': showNavbar,
        '-translate-y-full opacity-0': !showNavbar
     }"
     >
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}">
            <img src="{{ asset('images/CarVanLogo.png') }}" alt="Carvan Logo" class="h-12 w-14">
            </a>
        </div>

        <div class="sm:flex items-center space-x-4 md:space-x-8 lg:space-x-10 xl:space-x-12 2xl:space-x-20">
            <a href="{{ route('products.index') }}"
                class="mr-0 text-sm font-bold text-black hover:underline transform transition duration-300 ease-in-out hover:scale-105">
                New Products
            </a>

            <a href="{{ route('preowned.index') }}"
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
            <a href = "{{ route('AdminLogin')}}">
            <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Log In</button>
            </a>
        </div>
    </div>
</nav>
