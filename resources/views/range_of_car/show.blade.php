@extends('layouts.app') {{-- Hoặc layout chính của bạn --}}

@section('title', $rangeOfCar->name . ' Cars - Explore Our Collection') {{-- Tiêu đề trang động --}}

@section('content')
<div class="bg-gray-50 min-h-screen">

    {{-- 1. Range Hero Section --}}
    <section class="range-hero bg-gradient-to-r from-red-600 via-red-700 to-red-800 text-white py-10 md:py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-3">{{ $rangeOfCar->name }}</h1>
            @if($rangeOfCar->description)
                <p class="text-lg md:text-xl text-red-100 max-w-3xl mx-auto">
                    {{ $rangeOfCar->description }}
                </p>
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
                    <a href="{{ route('range_of_car.index') }}" class="text-gray-500 hover:text-red-700">Range of Cars</a>
                    <svg class="fill-current w-3 h-3 mx-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li class="flex items-center">
                    <span class="text-gray-700 font-semibold">{{ $rangeOfCar->name }}</span>
                </li>
            </ol>
        </nav>

        {{-- 2. Car Models List Section --}}
        <section id="car-models-in-range">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6 text-center md:text-left">
                Available Models in {{ $rangeOfCar->name }}
            </h2>

            @if($rangeOfCar->carModels && $rangeOfCar->carModels->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                    @foreach($rangeOfCar->carModels as $model)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden group flex flex-col hover:shadow-2xl transition-shadow duration-300">
                            <a href="{{ route('car_models.show', $model->id) }}" class="block">
                                @if($model->image)
                                    <img src="{{ asset($model->image) }}" alt="{{ $model->name }}" class="w-full h-52 object-cover transform group-hover:scale-105 transition-transform duration-300 ease-in-out">
                                @else
                                    <div class="w-full h-52 bg-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </a>
                            <div class="p-5 flex flex-col flex-grow">
                                <a href="{{ route('car_models.show', $model->id) }}" class="block">
                                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-red-700 transition-colors duration-300 mb-1 truncate" title="{{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}">
                                        {{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}
                                    </h3>
                                </a>
                                @if($model->brand)
                                    <p class="text-sm text-gray-600 mb-2">
                                        Brand: <a href="{{ route('brands.show', $model->brand->id) }}" class="text-red-600 hover:underline">{{ $model->brand->name }}</a>
                                    </p>
                                @endif

                                <p class="text-gray-700 text-sm mb-3 flex-grow">
                                    {{ Str::limit($model->description, 70) }}
                                </p>

                                @if(isset($model->inventories_min_price) && $model->inventories_min_price > 0)
                                    <p class="text-lg font-semibold text-red-700 mb-3">
                                        Price from: {{ number_format($model->inventories_min_price, 0, ',', '.') }} VND
                                    </p>
                                @else
                                    <p class="text-md text-gray-500 mb-3">
                                        Price unavailable
                                    </p>
                                @endif
                                <a href="{{ route('car_models.show', $model->id) }}"
                                   class="mt-auto inline-block w-full text-center bg-red-600 text-white font-semibold py-2.5 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition-colors duration-300">
                                    View Details
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

                {{-- Pagination Links --}}
                {{-- <div class="mt-8">
                    {{ $rangeOfCar->carModels->links() }}
                </div> --}}
            @else
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-xl text-gray-500">Sorry, there are currently no car models listed under the "{{ $rangeOfCar->name }}" range.</p>
                    <p class="text-gray-400 mt-2">Please check back later or explore other ranges.</p>
                    <a href="{{ route('range_of_car.index') }}"
                       class="mt-6 inline-block bg-red-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-red-600 transition-colors duration-300">
                        Explore Other Ranges
                    </a>
                </div>
            @endif
        </section>
    </div>
</div>
@endsection
