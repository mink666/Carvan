@extends('layouts.app')

@section('title', $brand->name . ' - Car Models and Information')

@section('content')
<div class="bg-gray-100">

    {{-- 1. Brand Hero Section --}}
    <section class="brand-hero bg-gradient-to-r from-gray-700 via-gray-800 to-black text-white py-12 md:py-20">
        <div class="container mx-auto px-4 text-center">
            @if($brand->logo)
                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }} Logo" class="h-20 md:h-28 mx-auto mb-6 object-contain filter drop-shadow-lg">
            @else
                {{-- Placeholder if no logo --}}
                <div class="w-24 h-24 md:w-32 md:h-32 bg-gray-600 flex items-center justify-center mx-auto mb-6 rounded-full">
                    <span class="text-3xl md:text-4xl font-semibold">{{ Str::substr($brand->name, 0, 1) }}</span>
                </div>
            @endif
            <h1 class="text-4xl md:text-5xl font-bold mb-3">{{ $brand->name }}</h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
                {{ Str::limit($brand->description, 150) }} {{-- Limit description length for hero --}}
            </p>
            @if($brand->year || $brand->location)
                <div class="mt-4 text-sm text-gray-400">
                    @if($brand->year)
                        <span>Established: {{ $brand->year }}</span>
                    @endif
                    @if($brand->year && $brand->location)
                        <span class="mx-2">|</span>
                    @endif
                    @if($brand->location)
                        <span>Headquarters: {{ $brand->location }}</span>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <div class="container mx-auto px-4 py-8 md:py-12">

        {{-- Breadcrumbs --}}
        <nav class="text-sm mb-8" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-red-700">Home</a>
                    <svg class="fill-current w-3 h-3 mx-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li class="flex items-center">
                    <a href="{{ route('brands.index') }}" class="text-gray-500 hover:text-red-700">Brands</a>
                    <svg class="fill-current w-3 h-3 mx-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li class="flex items-center">
                    <span class="text-gray-700 font-semibold">{{ $brand->name }}</span>
                </li>
            </ol>
        </nav>

        {{-- 2. Brand Description Section --}}
        @if($brand->description)
        <section id="brand-description" class="mb-10 md:mb-16 bg-white p-6 md:p-8 rounded-xl shadow-xl">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-4 border-b pb-3 border-gray-200">About {{ $brand->name }}</h2>
            <div class="text-gray-700 leading-relaxed space-y-4">
                {!! nl2br(e($brand->description)) !!} {{-- nl2br for line breaks, e() for HTML escaping --}}
            </div>
        </section>
        @endif

        {{-- 3. Car Models Section --}}
        <section id="car-models">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-8 text-center md:text-left">
                Explore Models from {{ $brand->name }}
            </h2>
            @if($brand->carModels && $brand->carModels->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                    @foreach($brand->carModels as $model)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden group flex flex-col hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-1">
                            <a href="{{ route('car_models.show', $model->id) }}" class="block overflow-hidden">
                                @if($model->image)
                                    <img src="{{ asset($model->image) }}" alt="{{ $model->name }}" class="w-full h-56 object-cover transform group-hover:scale-105 transition-transform duration-500 ease-in-out">
                                @else
                                    <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </a>
                            <div class="p-5 flex flex-col flex-grow">
                                <a href="{{ route('car_models.show', $model->id) }}" class="block">
                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-red-700 transition-colors duration-300 mb-1 truncate" title="{{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}">
                                        {{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}
                                    </h3>
                                </a>
                                @if($model->rangeOfCars)
                                    <p class="text-xs text-gray-500 mb-2 bg-gray-100 px-2 py-0.5 rounded-full self-start">{{ $model->rangeOfCars->name }}</p>
                                @endif

                                {{-- Short description of the car model --}}
                                <p class="text-gray-600 text-sm mb-4 flex-grow">
                                    {{ Str::limit($model->description, 80) }}
                                </p>

                                @if(isset($model->inventories_min_price) && $model->inventories_min_price > 0)
                                    <p class="text-lg font-semibold text-red-600 mb-4">
                                        Price from: {{ number_format($model->inventories_min_price, 0, ',', '.') }} VND
                                    </p>
                                @else
                                    <p class="text-md text-gray-500 mb-4">
                                        Price unavailable
                                    </p>
                                @endif
                                <a href="{{ route('car_models.show', $model->id) }}"
                                   class="mt-auto inline-block w-full text-center bg-red-600 text-white font-semibold py-2.5 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition-colors duration-300">
                                    View Model Details
                                </a>
                                {{-- Test Drive Form --}}
                                {{--
                                <a href="{{ route('testdrive.form', ['car_model_id' => $model->id]) }}"
                                   class="mt-2 inline-block w-full text-center bg-gray-700 text-white font-semibold py-2 px-4 rounded-md hover:bg-gray-800 transition-colors duration-300">
                                    Request Test Drive
                                </a>
                                --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                     <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-xl text-gray-500">There are currently no models listed for {{ $brand->name }}.</p>
                    <p class="text-gray-400 mt-2">Please check back later or explore other brands.</p>
                     <a href="{{ route('brands.index') }}"
                       class="mt-6 inline-block bg-red-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-red-600 transition-colors duration-300">
                        Explore Other Brands
                    </a>
                </div>
            @endif
        </section>

    </div>
</div> 
@endsection

