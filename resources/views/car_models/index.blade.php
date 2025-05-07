@extends('layouts.app')

@section('title', 'All Car Models - Carvan')

@section('content')
<div class="bg-gray-50 py-8 md:py-12">
    <div class="container mx-auto px-4">

        {{-- Page Header --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800">Explore Our Car Models</h1>
            <p class="text-lg text-gray-600 mt-2">Find the perfect vehicle that suits your style and needs.</p>
        </div>

        {{-- Filters and Sorting --}}
        <div class="mb-8 p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-3">Filter & Sort</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="filter-brand" class="block text-sm font-medium text-gray-700">Brand</label>
                    <select id="filter-brand" name="filter-brand" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                        <option>All Brands</option> {{-- Change list later --}}
                    </select>
                </div>
                <div>
                    <label for="filter-range" class="block text-sm font-medium text-gray-700">Range</label>
                    <select id="filter-range" name="filter-range" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                        <option>All Ranges</option> {{-- Change list later --}}
                    </select>
                </div>
                <div>
                    <label for="sort-by" class="block text-sm font-medium text-gray-700">Sort By</label>
                    <select id="sort-by" name="sort-by" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                        <option>Name A-Z</option>
                        <option>Price Low-High</option>
                        <option>Price High-Low</option>
                        <option>Newest</option>
                    </select>
                </div>
            </div>
        </div>


        {{-- Car Models Grid --}}
        @if($carModels && $carModels->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                @foreach($carModels as $model)
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
                                <h3 class="text-xl font-bold text-gray-800 group-hover:text-red-700 transition-colors duration-300 mb-1 truncate" title="{{ $model->brand->name ?? '' }} {{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}">
                                    {{ $model->brand->name ?? '' }} {{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}
                                </h3>
                            </a>
                            @if($model->rangeOfCars)
                                <p class="text-sm text-gray-500 mb-2">{{ $model->rangeOfCars->name }}</p>
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
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination Links --}}
            <div class="mt-10">
                {{ $carModels->links() }}
            </div>
        @else
            <div class="text-center py-10">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-xl text-gray-500">No car models found at the moment.</p>
                <p class="text-gray-400 mt-2">Please check back later or try different filters.</p>
            </div>
        @endif
    </div>
</div>
@endsection
