@extends('layouts.app')

@section('title', 'Welcome to Carvan - Your Premier Car Destination')

@section('content')

    {{-- 1. Slideshow Section --}}
    <section id="hero-slideshow" class="w-full h-[60vh] md:h-[80vh] bg-gray-300 text-white flex items-center justify-center">
        {{--
            PLACEHOLDER FOR YOUR SLIDESHOW COMPONENT
        --}}
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 text-gray-800">Carvan Slideshow</h1>
            <p class="text-xl md:text-2xl text-gray-600">Your awesome car images will appear here.</p>
        </div>
    </section>

    {{-- Container chung cho nội dung bên dưới slideshow --}}
    <div class="container mx-auto px-4 py-8 md:py-12">

        {{-- 2. Welcome Message / Short Introduction --}}
        <section id="welcome" class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-4">Welcome to Carvan</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Discover a wide range of new and certified pre-owned vehicles from the world's leading brands.
                At Carvan, we are committed to providing you with the best car buying experience and exceptional customer service.
            </p>
        </section>

        {{-- 3. Featured Brands Section --}}
        @if(isset($featuredBrands) && $featuredBrands->count() > 0)
        <section id="featured-brands" class="mb-12 md:mb-16">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6 text-center">Our Prestigious Brands</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-6">
                @foreach($featuredBrands as $brand)
                    <a href="{{ route('brands.show', $brand->id) }}"
                       class="group block bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out text-center">
                        @if($brand->logo)
                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }} Logo" class="h-16 mx-auto mb-3 object-contain transition-transform duration-300 group-hover:scale-110">
                        @else
                            <div class="h-16 w-full bg-gray-200 flex items-center justify-center rounded mb-3">
                                <span class="text-gray-400 text-sm">No Logo</span>
                            </div>
                        @endif
                        <h3 class="text-md font-semibold text-gray-700 group-hover:text-red-600">{{ $brand->name }}</h3>
                    </a>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('brands.index') }}"
                   class="inline-block bg-red-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-red-700 transition-colors duration-300">
                    View All Brands
                </a>
            </div>
        </section>
        @endif

        {{-- 4. How It Works / Our Services (Focus on Test Drive) --}}
        <section id="how-it-works" class="mb-12 md:mb-16 bg-gray-50 py-10 px-6 rounded-lg">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-8 text-center">Experience Your Dream Car</h2>
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="flex flex-col items-center">
                    <div class="bg-red-500 text-white rounded-full p-4 mb-4 inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                          </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">1. Explore Our Collection</h3>
                    <p class="text-gray-600">
                        Browse through our extensive catalog of vehicles from various top brands. Find the car that fits your style and needs.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-red-500 text-white rounded-full p-4 mb-4 inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                          </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">2. Schedule a Test Drive</h3>
                    <p class="text-gray-600">
                        Found something you love? Easily submit a test drive request online. Choose your preferred date and time.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-red-500 text-white rounded-full p-4 mb-4 inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                          </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">3. Enjoy the Ride</h3>
                    <p class="text-gray-600">
                        Visit our showroom or a designated location and experience the thrill of driving your chosen car. Our team is here to assist you.
                    </p>
                </div>
            </div>
        </section>

        {{-- 5. Call to Action - Test Drive Form --}}
        <section id="cta-test-drive" class="text-center mb-12 md:mb-16 py-10 bg-cover bg-center rounded-lg" style="background-image: url('https://images.unsplash.com/photo-1553531889-0c9089521a24?q=80&w=1920&auto=format&fit=crop');">
            <div class="bg-black bg-opacity-50 py-12 px-6 rounded-lg">
                <h2 class="text-3xl md:text-4xl font-semibold text-white mb-4">Ready to Find Your Perfect Car?</h2>
                <p class="text-lg text-gray-200 mb-8 max-w-2xl mx-auto">
                    The best way to know if a car is right for you is to get behind the wheel. <br class="hidden sm:block">
                    Submit your test drive request today!
                </p>
                <a href="{{ route('test_drive.index')}}"
                   class="inline-block bg-white text-red-600 font-bold py-3 px-10 rounded-lg hover:bg-gray-100 text-lg transition-colors duration-300 transform hover:scale-105">
                    Request a Test Drive
                </a>
            </div>
        </section>

        {{-- 6. Popular Models / New Arrivals (Optional) --}}
        @if(isset($popularModels) && $popularModels->count() > 0)
        <section id="popular-models" class="mb-12 md:mb-16">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6 text-center">Popular Models</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($popularModels as $model)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden group">
                    <a href="{{ route('car_models.show', $model->id) }}" class="block">
                        @if($model->image)
                            <img src="{{ asset($model->image) }}" alt="{{ $model->name }}" class="w-full h-48 object-cover group-hover:opacity-80 transition-opacity duration-300">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-red-600">{{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}</h3>
                            @if($model->brand)
                                <p class="text-sm text-gray-500">{{ $model->brand->name }}</p>
                            @endif
                            {{-- Sử dụng inventories_min_price đã được xử lý trong controller --}}
                            @if(isset($model->inventories_min_price) && $model->inventories_min_price > 0)
                                <p class="text-md font-semibold text-red-600 mt-1">
                                    Price from: {{ number_format($model->inventories_min_price, 0, ',', '.') }} VND
                                </p>
                            @else
                                <p class="text-md text-gray-600 mt-1">
                                    Price unavailable
                                </p>
                            @endif
                            <span class="mt-2 inline-block text-red-500 group-hover:text-red-700 text-sm">View Details &rarr;</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
        @endif

    </div> {{-- End of main container --}}

@endsection

