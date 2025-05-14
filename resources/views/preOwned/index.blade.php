@extends('layouts.app')

@section('title', 'Pre-Owned Vehicles - Quality Assured at Carvan')

@section('content')
<div class="bg-gray-50 min-h-screen">

    {{-- Page Header --}}
    <section class="page-header bg-gradient-to-r from-teal-500 via-cyan-600 to-sky-700 text-white py-16 md:py-24">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Certified Pre-Owned Vehicles</h1>
            <p class="mt-4 text-lg md:text-xl text-teal-100 max-w-3xl mx-auto">
                Discover our handpicked selection of quality pre-owned cars, each thoroughly inspected and ready for a new journey.
            </p>
        </div>
    </section>

    <div class="container mx-auto px-4 py-12 md:py-16">

        {{-- Optional: Filters Section Placeholder --}}
        {{-- <div class="mb-8 p-4 bg-white rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-3">Filter Pre-Owned Cars</h3>
            <p class="text-sm text-gray-600">Filters for brand, model, price range, mileage, etc., can be added here.</p>
            </div> --}}

        @if($preownedCars && $preownedCars->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                @foreach($preownedCars as $preowned)
                    @php
                        // Lấy thông tin CarModel và Brand từ Preowned thông qua Inventory
                        $inventory = $preowned->inventory;
                        $carModel = $inventory ? $inventory->carModel : null;
                        $brand = $carModel ? $carModel->brand : null;
                    @endphp

                    @if($carModel && $brand) {{-- Chỉ hiển thị nếu có đủ thông tin cơ bản --}}
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden group flex flex-col hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-1.5">
                        <a href="{{ route('preOwned.show', $preowned->id) }}" class="block overflow-hidden relative">
                            {{-- Ảnh của xe pre-owned (từ bảng preowneds) hoặc ảnh chung của model --}}
                            <img src="{{ $preowned->image ? asset($preowned->image) : ($carModel->image ? asset($carModel->image) : asset('assets/images/default-car-large.jpg')) }}"
                                 alt="{{ $brand->name }} {{ $carModel->name }} - Pre-Owned"
                                 class="w-full h-56 object-cover transform group-hover:scale-105 transition-transform duration-500 ease-in-out">
                            <span class="absolute top-3 left-3 bg-yellow-500 text-white text-xs font-bold px-2.5 py-1 rounded">PRE-OWNED</span>
                            @if($carModel->rangeOfCars)
                                <span class="absolute top-3 right-3 bg-black bg-opacity-60 text-white text-xs font-semibold px-2 py-0.5 rounded-full">{{ $carModel->rangeOfCars->name }}</span>
                            @endif
                        </a>
                        <div class="p-5 flex flex-col flex-grow">
                            <a href="{{ route('preOwned.show', $preowned->id) }}" class="block">
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-teal-700 transition-colors duration-300 mb-1 truncate" title="{{ $brand->name }} {{ $carModel->name }} ({{ $carModel->year }})">
                                    {{ $brand->name }} {{ $carModel->name }} <span class="text-gray-500 font-medium">({{ $carModel->year }})</span>
                                </h3>
                            </a>

                            <div class="text-sm text-gray-600 mb-3 space-y-1">
                                <p><strong>Mileage:</strong> {{ number_format($preowned->mileage, 0, ',', '.') }} km</p>
                                <p><strong>Condition:</strong> {{ $preowned->condition ?? 'N/A' }}</p>
                            </div>

                            <p class="text-2xl font-bold text-teal-600 mb-4">
                                {{ number_format($preowned->price, 0, ',', '.') }} VND
                            </p>

                            <a href="{{ route('preOwned.show', $preowned->id) }}"
                               class="mt-auto inline-block w-full text-center bg-teal-600 text-white font-semibold py-2.5 px-4 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-opacity-50 transition-colors duration-300">
                                View Details & Inquire
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            {{-- Pagination Links --}}
            <div class="mt-12">
                {{ $preownedCars->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-xl shadow-lg">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-2xl text-gray-600">No pre-owned vehicles available at the moment.</p>
                <p class="text-gray-500 mt-3">Please check back soon for our updated inventory.</p>
            </div>
        @endif
    </div>
</div>
@endsection
