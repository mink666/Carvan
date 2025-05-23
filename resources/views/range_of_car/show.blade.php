@extends('layouts.app')

@section('title', $rangeOfCar->name . ' - Carvan')

@section('content')
<div class="bg-gray-100 min-h-screen">

    {{-- 1. Range Hero Section--}}
    <section class="range-hero relative text-white py-20 md:py-32 text-center bg-gray-800">
        <div id="randomGradientBackground" class="absolute inset-0 opacity-50">
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-3 filter drop-shadow-lg">{{ $rangeOfCar->name }}</h1>
            @if($rangeOfCar->description)
                <p class="mt-4 text-lg md:text-xl text-gray-200 max-w-3xl mx-auto filter drop-shadow-sm">
                    {{ $rangeOfCar->description }}
                </p>
            @endif
        </div>
    </section>

    <div class="container mx-auto px-4 py-10 md:py-14">
        {{-- Breadcrumbs --}}
        <nav class="text-sm mb-8 md:mb-12" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex items-center text-gray-600">
                <li class="flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-red-700 transition-colors">Home</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li class="flex items-center">
                    <a href="{{ route('range_of_car.index') }}" class="hover:text-red-700 transition-colors">Vehicle Categories</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li class="flex items-center">
                    <span class="text-gray-800 font-semibold">{{ $rangeOfCar->name }}</span>
                </li>
            </ol>
        </nav>

        {{-- 2. Car Models List Section --}}
        <section id="car-models-in-range">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-8 md:mb-10 text-center">
                Discover Our {{ $rangeOfCar->name }} Lineup
            </h2>

            @if($rangeOfCar->carModels && $rangeOfCar->carModels->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                    @foreach($rangeOfCar->carModels as $model)
                        <div class="bg-white rounded-xl shadow-xl overflow-hidden group flex flex-col hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:scale-[1.02]">
                            <a href="{{ route('products.show', $model->id) }}" class="block overflow-hidden relative">
                                @if($model->image)
                                    <img src="{{ asset($model->image) }}" alt="{{ $model->name }}" class="w-full h-56 object-cover transform group-hover:scale-110 transition-transform duration-500 ease-in-out">
                                @else
                                    <div class="w-full h-56 bg-gray-200 flex items-center justify-center rounded-t-xl">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                @if($model->brand)
                                <span class="absolute top-3 right-3 bg-black bg-opacity-60 text-white text-xs font-semibold px-2.5 py-1 rounded-full">{{ $model->brand->name }}</span>
                                @endif
                            </a>
                            <div class="p-5 flex flex-col flex-grow">
                                <a href="{{ route('products.show', $model->id) }}" class="block">
                                    <h3 class="text-xl font-semibold text-gray-900 group-hover:text-red-700 transition-colors duration-300 mb-1 truncate" title="{{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}">
                                        {{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}
                                    </h3>
                                </a>

                                <p class="text-gray-600 text-sm mb-4 flex-grow">
                                    {{ Str::limit($model->description, 75) }}
                                </p>

                                @if(isset($model->inventories_min_price) && $model->inventories_min_price > 0)
                                    <p class="text-xl font-bold text-red-600 mb-4">
                                        Price from: {{ number_format($model->inventories_min_price, 0, ',', '.') }} VND
                                    </p>
                                @else
                                    <p class="text-lg text-gray-500 mb-4">
                                        Price unavailable
                                    </p>
                                @endif
                                <a href="{{ route('products.show', $model->id) }}"
                                   class="mt-auto inline-block w-full text-center bg-red-400 text-white font-semibold py-3 px-4 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition-colors duration-300">
                                    View Details &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($rangeOfCar instanceof \Illuminate\Pagination\LengthAwarePaginator && $rangesOfCars->hasPages())
                <div class="mt-12">
                    {{ $rangeOfCar->links() }}
                </div>
                @endif
            @else
                <div class="bg-white p-10 rounded-xl shadow-lg text-center">
                     <svg class="w-20 h-20 text-gray-300 mx-auto mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-2xl text-gray-600">Sorry, no models currently listed under "{{ $rangeOfCar->name }}".</p>
                    <p class="text-gray-500 mt-3">Our collection is always evolving. Please check back soon or explore other categories.</p>
                    <a href="{{ route('range_of_car.index') }}"
                       class="mt-8 inline-block bg-red-500 text-white font-semibold py-3 px-8 rounded-lg hover:bg-red-600 transition-colors duration-300">
                        Explore Other Categories
                    </a>
                </div>
            @endif
        </section>
    </div>
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    const gradientDiv = document.getElementById('randomGradientBackground');

    const colors = [
        '#FFADAD', '#FFD6A5', '#FDFFB6', '#CAFFBF', '#9BF6FF', '#A0C4FF', '#BDB2FF', '#FFC6FF' // Example hex colors
    ];
    const directions = [
        'to right', 'to bottom right', 'to bottom', 'to bottom left', 'to left', 'to top left', 'to top', 'to top right'
    ];

    function getRandomElement(arr) {
        return arr[Math.floor(Math.random() * arr.length)];
    }

    const randomColor1 = getRandomElement(colors);
    let randomColor2 = getRandomElement(colors);
    while (randomColor2 === randomColor1 && colors.length > 1) {
        randomColor2 = getRandomElement(colors);
    }
    const randomDirection = getRandomElement(directions);

    gradientDiv.style.backgroundImage = `linear-gradient(${randomDirection}, ${randomColor1}, ${randomColor2})`;
});
</script>
@push('styles')
<style>
    .page-hero .drop-shadow-lg {
        filter: drop-shadow(0 4px 3px rgba(0,0,0,0.3)) drop-shadow(0 2px 2px rgba(0,0,0,0.2));
    }
    .page-hero .drop-shadow-sm {
        filter: drop-shadow(0 1px 1px rgba(0,0,0,0.2));
    }
    .range-card:hover .text-sky-600 {
        color: #0284c7;
    }
    .range-card h2:hover {
    }
</style>
@endpush
