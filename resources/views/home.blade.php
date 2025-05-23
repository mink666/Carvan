@extends('layouts.app')

@section('title', 'Home - Carvan')

@section('content')

    {{-- 1. Slideshow Section --}}
    <section id="#top" class="hero-banner-section">
        <div class="swiper hero-banner-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="banner-slide">
                        <img src="https://wallpapercat.com/w/full/f/2/6/1452770-1920x1080-desktop-full-hd-vinfast-background.jpg"
                            class="slide-background-image" alt="Company Values">
                        <div class="slide-overlay"></div>
                        <div class="slide-content">
                            <h2>Leading Innovation in Mobility</h2>
                            <p>Discover our commitment to quality and customer satisfaction.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner-slide">
                        <img src="https://images6.alphacoders.com/115/1154171.jpg" class="slide-background-image"
                            alt="Our Vision">
                        <div class="slide-overlay"></div>
                        <div class="slide-content">
                            <h2>Driving Towards a Sustainable Future</h2>
                            <p>Explore our goals for eco-friendly practices and community growth.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <div class="container mx-auto px-4 py-6 md:py-8">
        {{-- 2. Welcome Message --}}
        <section id="welcome" class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-4">Welcome to Carvan: Your Journey Begins Here.
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto font-light">
                From the moment you dream of a new ride to the exhilarating feel of the steering wheel in your hands, Carvan
                is dedicated to making your car discovery seamless and exciting. We are more than just an online car
                marketplace; we are a collective of passionate automotive enthusiasts and tech innovators, committed to
                bringing you an unparalleled selection from the world's most trusted brands.
            </p>
            </br>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto font-light">
                At Carvan, we are constantly looking forward, embracing new technologies to enhance your experience and
                simplify your path to ownership. Explore our diverse collection, discover automotive innovations, and let us
                help you find the car that not only moves you but also reflects who you are. Your next great drive starts
                with Carvan.
            </p>
        </section>

        {{-- 3. Featured Brands Section --}}
        @if (isset($featuredBrands) && $featuredBrands->count() > 0)
            <section id="featured-brands" class="mb-12 md:mb-16 bg-black py-10 px-6 rounded-lg">
                <h2 class="text-2xl md:text-3xl font-semibold text-white mb-6 text-center">Our Prestigious Brands</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-6">
                    @foreach ($featuredBrands as $brand)
                        <a href="{{ route('brands.show', $brand->id) }}"
                            class="group block bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out text-center">
                            @if ($brand->logo)
                                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }} Logo"
                                    class="h-16 mx-auto mb-3 object-contain transition-transform duration-300 group-hover:scale-110">
                            @else
                                <div class="h-16 w-full bg-gray-200 flex items-center justify-center rounded mb-3">
                                    <span class="text-gray-400 text-sm">No Logo</span>
                                </div>
                            @endif
                            <h3 class="text-md font-semibold text-gray-700 group-hover:text-red-600">{{ $brand->name }}
                            </h3>
                        </a>
                    @endforeach
                </div>
                <div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-8">
                    <a href="{{ route('brands.index') }}"
                        class="inline-block bg-red-400 text-white font-semibold py-3 px-8 rounded-lg hover:bg-red-700 hover:text-white transition-colors duration-300">
                        View All Brands
                    </a>
                    <span class="mx-2 font-semibold text-white">OR</span>
                    <a href="{{ route('range_of_car.index') }}"
                        class="inline-block bg-red-400 text-white font-semibold py-3 px-8 rounded-lg hover:bg-red-700 hover:text-white transition-colors duration-300">
                        Explore All Ranges
                    </a>
                </div>
            </section>
        @endif

        {{-- 4. Random Featured Models --}}
        @if (isset($popularModels) && $popularModels->count() > 0)
            <section id="popular-models" class="mb-12 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2 text-center">Featured Vehicles</h2>
                <p class="text-sm font-semibold text-gry-800 tracking-wider text-center mb-10">Explore our new models</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach ($popularModels as $model)
                        @if ($model->displayInventory)
                            @php $inventory = $model->displayInventory; @endphp
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group">
                                <div class="relative">
                                    <a href="{{ route('products.show', $model->id) }}" class="block">
                                        <img src="{{ $model->image ? asset($model->image) : asset('assets/images/default-car-large.jpg') }}"
                                            alt="{{ $model->brand->name ?? '' }} {{ $model->name }}"
                                            class=" w-full h-56 md:h-64 object-contain transition-transform duration-300 ease-in-out group-hover:scale-105">
                                    </a>
                                </div>

                                <div class="p-5 md:p-6 flex flex-col flex-grow">
                                    <div class="flex justify-between items-center text-xs text-gray-500 mb-2">
                                        <span>{{ $model->year }}</span>
                                        @if ($inventory->status)
                                            <span
                                                class="px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full {{ $inventory->status === 'sale' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                For {{ ucfirst($inventory->status) }}
                                            </span>
                                        @endif
                                    </div>

                                    <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-1 truncate"
                                        title="{{ $model->brand->name ?? '' }} {{ $model->name }}">
                                        <a href="{{ route('products.show', $model->id) }}"
                                            class="hover:text-red-700 transition-colors">
                                            {{ strtoupper($model->brand->name ?? '') }} {{ strtoupper($model->name) }}
                                        </a>
                                    </h3>

                                    <p class="text-2xl lg:text-xl font-medium text-red-500 mb-4">
                                        {{ number_format($inventory->price, 0, ',', '.') }} VND
                                    </p>

                                    <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                        <div>
                                            <p class="text-gray-500 uppercase tracking-wider text-xs">Exterior Color</p>
                                            <p class="font-semibold text-gray-700">{{ $inventory->color ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 uppercase tracking-wider text-xs">Interior Color</p>
                                            <p class="font-semibold text-gray-700">
                                                {{ $inventory->interior_color ?? 'N/A' }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-auto gap-3">
                                        <a href="{{ route('products.show', $model->id) }}"
                                            class="block w-full text-center bg-white text-black font-semibold py-3 px-4 rounded-md border border-gray-300 hover:border-black hover:bg-black hover:text-white transition-colors duration-300 text-sm">
                                            MORE DETAILS
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        @endif

        {{-- 5. Featured Pre-Owned Vehicles Section --}}
        @if (isset($featuredPreownedCars) && $featuredPreownedCars->count() > 0)
            <section id="featured-preowned" class="mb-12 md:mb-16 pt-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2 text-center">Quality Pre-Owned Vehicles</h2>
                <p class="text-sm font-semibold text-gray-700 tracking-wider text-center mb-10">Handpicked and ready for you
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach ($featuredPreownedCars as $preowned)
                        <div
                            class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-1.5">
                            <div class="relative">
                                <a href="{{ route('preowned.show', $preowned->id) }}" class="block">
                                    <img src="{{ $preowned->image ? asset($preowned->image) : asset('assets/images/default-car-large.jpg') }}"
                                        alt="{{ $preowned->name }}"
                                        class="w-full h-56 md:h-64 object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
                                </a>
                                <span
                                    class="absolute top-3 left-3 bg-yellow-400 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full shadow">PRE-OWNED</span>
                            </div>

                            <div class="p-5 md:p-6 flex flex-col flex-grow">
                                <div class="flex justify-between items-center text-xs text-gray-500 mb-2">
                                    <span>Milleage: {{ number_format($preowned->mileage, 0, ',', '.') }} KM</span>
                                </div>

                                <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-1 truncate"
                                    title="{{ $preowned->name }}">
                                    <a href="{{ route('preowned.show', $preowned->id) }}"
                                        class="hover:text-red-700 transition-colors">
                                        {{ strtoupper($preowned->name) }}
                                    </a>
                                </h3>

                                <p class="text-2xl lg:text-xl font-semibold text-red-500 mb-4">
                                    {{ number_format($preowned->price, 0, ',', '.') }} VND
                                </p>

                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500 uppercase tracking-wider text-xs">Exterior Color</p>
                                        <p class="font-semibold text-gray-700">{{ $preowned->color ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 uppercase tracking-wider text-xs">Interior Color</p>
                                        <p class="font-semibold text-gray-700">{{ $preowned->interior_color ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 uppercase tracking-wider text-xs">Condition</p>
                                        <p class="font-semibold text-gray-700">{{ $preowned->condition ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <div class="mt-auto gap-3">
                                    <a href="{{ route('preowned.show', $preowned->id) }}"
                                        class="block w-full text-center bg-white text-gray-700 font-semibold py-3 px-4 rounded-md border border-gray-300 hover:bg-black hover:text-white transition-colors duration-300 text-sm">
                                        MORE DETAILS
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- 4. How It Works / Our Services --}}
        <section id="how-it-works" class=" mb-12 md:mb-16 py-10 px-6 rounded-lg">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-8 text-center">Experience Your Dream Car</h2>
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="flex flex-col items-center">
                    <div class="bg-red-500 text-white rounded-full p-4 mb-4 inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">1. Explore Our Collection</h3>
                    <p class="text-gray-600">
                        Browse through our extensive catalog of vehicles from various top brands. Find the car that fits
                        your style and needs.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-red-500 text-white rounded-full p-4 mb-4 inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">2. Schedule a Test Drive</h3>
                    <p class="text-gray-600">
                        Found something you love? Easily submit a test drive request online. Choose your preferred date and
                        time.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-red-500 text-white rounded-full p-4 mb-4 inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">3. Enjoy the Ride</h3>
                    <p class="text-gray-600">
                        Visit our showroom or a designated location and experience the thrill of driving your chosen car.
                        Our team is here to assist you.
                    </p>
                </div>
            </div>
        </section>

        {{-- 5. Call to Action - Test Drive Form --}}
        <section id="cta-test-drive" class="text-center mb-12 md:mb-6 py-10 bg-cover bg-center rounded-lg"
            style="background-image: url('https://images.unsplash.com/photo-1614609953905-baeff400aab3?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8c3RlZXJpbmclMjB3aGVlbHxlbnwwfHwwfHx8MA%3D%3D');">
            <div class="bg-black bg-opacity-50 py-12 px-6 rounded-lg">
                <h2 class="text-3xl md:text-4xl font-semibold text-white mb-4">Ready to Find Your Perfect Car?</h2>
                <p class="text-lg text-gray-200 mb-8 max-w-2xl mx-auto">
                    The best way to know if a car is right for you is to get behind the wheel. <br class="hidden sm:block">
                    Submit your test drive request today!
                </p>
                <a href="{{ route('test_drive.index') }}"
                    class="inline-block bg-white text-red-600 font-bold py-3 px-10 rounded-lg hover:bg-gray-100 text-lg transition-colors duration-300 transform hover:scale-105">
                    Request a Test Drive
                </a>
            </div>
        </section>

        {{-- 7. News Section --}}
        <section id="carvan-news" class="py-12 md:py-16">
            <div class="container mx-auto px-4">
                <div class="text-center mb-10 md:mb-16">
                    <p class="text-sm font-semibold text-red-600 uppercase tracking-wider">LATEST UPDATES</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-1">Carvan World News</h2>
                </div>
            </div>

<div class="news-items-container rounded-lg shadow-lg overflow-hidden">

    @forelse ($latestNews as $newsItem)
        <article
            class="news-item-full-width group
                    {{ $loop->index % 2 === 0 ? 'bg-black text-white' : 'bg-white text-gray-800' }}">
            <div class="container mx-auto px-4">
                <div
                    class="md:flex md:items-center {{ $loop->index % 2 === 1 ? 'md:flex-row-reverse' : '' }}
                            py-10 md:py-16
                            md:space-x-reverse md:space-x-8 lg:space-x-12">
                    <div class="md:w-1/2 lg:w-3/5 mb-6 md:mb-0">
                        <a href="{{ route('news.show', ['news' => $newsItem->id]) }}"
                           class="block overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                            <img src="{{  asset('images/' . $newsItem->image)  }}" alt="{{ $newsItem->title }}"
                                 class="w-full h-auto object-contain transform transition-transform duration-500 ease-in-out group-hover:scale-105 aspect-[16/9]">
                        </a>
                    </div>

                    <div class="md:w-1/2 lg:w-2/5 flex flex-col justify-center">
                        <p class="text-xs {{ $loop->index % 2 === 0 ? 'text-gray-400' : 'text-gray-500' }} mb-2">
                            <span>{{ $newsItem->date ? $newsItem->date->format('j M Y') : 'N/A' }}</span>
                        </p>
                        <p class="text-xs font-semibold {{ $loop->index % 2 === 0 ? 'text-red-400' : 'text-red-500' }} uppercase tracking-wider mb-2">
                            LATEST UPDATE </p>

                        <h3
                            class="text-2xl md:text-3xl font-bold {{ $loop->index % 2 === 0 ? 'text-white group-hover:text-red-300' : 'text-gray-900 group-hover:text-red-700' }} mb-3 leading-tight transition-colors">
                            <a href="{{ route('news.show', ['news' => $newsItem->id]) }}">{{ $newsItem->title }}</a>
                        </h3>
                        <p class="{{ $loop->index % 2 === 0 ? 'text-gray-300' : 'text-gray-700' }} mb-6 leading-relaxed text-base">
                            {{ Str::limit(strip_tags($newsItem->content), 150) }}
                        </p>
                        <a href="{{ route('news.show', ['news' => $newsItem->id]) }}"
                           class="self-start inline-block font-semibold py-2.5 px-6 rounded-md text-sm
                                @if ($loop->index % 2 === 0) {{-- Nền đen, chữ trắng cho item chẵn --}}
                                    bg-white text-black hover:bg-gray-400 focus:ring-2 focus:ring-gray-300
                                @else {{-- Nền trắng, chữ đen cho item lẻ --}}
                                    border border-gray-700 text-gray-800 hover:bg-gray-800 hover:text-white hover:border-gray-800 focus:ring-2 focus:ring-gray-600
                                @endif
                                transition-all duration-300">
                            READ MORE
                        </a>
                    </div>
                </div>
            </div>
        </article>
    @empty
        <div class="p-10 text-center {{ $loop->index % 2 === 0 ? 'bg-black text-white' : 'bg-white text-gray-800' }}">
            <p>No news articles available at the moment.</p>
        </div>
    @endforelse
</div>
            <div class="container mx-auto px-4">
                <div class="text-center pt-10 md:pt-16">
                    <a href="{{ route('news_events.index') }}" "news-events"
                        class="inline-block border border-black bg-black text-white font-semibold py-3 px-10 hover:bg-white hover:text-black transition-all duration-300 text-base rounded-md">
                        See All
                    </a>
                </div>
            </div>
        </section>
        <a href="#top"
            class="fixed bottom-5 right-5 bg-white text-black rounded-full p-3 shadow-lg hover:bg-gray-400 transition duration-300 z-50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </a>
    </div> 
@endsection
