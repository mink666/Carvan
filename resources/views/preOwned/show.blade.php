@extends('layouts.app')

@php
    // Lấy thông tin CarModel và Brand từ Preowned thông qua Inventory
    $inventory = $preownedCar->inventory;
    $carModel = $inventory ? $inventory->carModel : null;
    $brand = $carModel ? $carModel->brand : null;
    $pageTitle = "Pre-Owned: ";
    if ($brand) $pageTitle .= $brand->name . " ";
    if ($carModel) $pageTitle .= $carModel->name . ($carModel->year ? ' (' . $carModel->year . ')' : '');
    else $pageTitle .= "Vehicle Details";
@endphp

@section('title', $pageTitle . ' - Carvan')

@section('content')
<div class="bg-gray-100 py-8 md:py-12">
    <div class="container mx-auto px-4">

        @if($carModel && $brand) {{-- Chỉ hiển thị nếu có đủ thông tin cơ bản --}}
            {{-- Breadcrumbs --}}
            <nav class="text-sm mb-8" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-teal-700">Home</a>
                        <svg class="fill-current w-3 h-3 mx-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                    </li>
                    <li class="flex items-center">
                        <a href="{{ route('preOwned.index') }}" class="text-gray-600 hover:text-teal-700">Pre-Owned Cars</a>
                        <svg class="fill-current w-3 h-3 mx-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                    </li>
                    <li class="flex items-center">
                        <span class="text-gray-800 font-semibold">{{ $brand->name }} {{ $carModel->name }} ({{ $carModel->year }})</span>
                    </li>
                </ol>
            </nav>

            <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
                <div class="lg:flex">
                    {{-- Image Section --}}
                    <div class="lg:w-3/5 p-4 md:p-6">
                        <div class="relative">
                            <img src="{{ $preownedCar->image ? asset($preownedCar->image) : ($carModel->image ? asset($carModel->image) : asset('assets/images/default-car-large.jpg')) }}"
                                 alt="Pre-Owned {{ $brand->name }} {{ $carModel->name }}"
                                 class="w-full h-auto object-contain rounded-lg shadow-md max-h-[600px]">
                            <span class="absolute top-4 left-4 bg-yellow-500 text-white text-sm font-bold px-3 py-1.5 rounded-md shadow">PRE-OWNED</span>
                        </div>
                        {{-- TODO: Add image gallery for preowned car if available --}}
                    </div>

                    {{-- Details Section --}}
                    <div class="lg:w-2/5 p-6 md:p-8 flex flex-col">
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-1">{{ $brand->name }} {{ $carModel->name }}</h1>
                        <p class="text-xl text-gray-600 mb-4">{{ $carModel->year ? 'Model Year: '.$carModel->year : '' }}</p>

                        @if($carModel->rangeOfCars)
                        <span class="inline-block bg-gray-200 text-gray-700 text-xs font-semibold px-2.5 py-0.5 rounded-full mb-4 self-start">
                            {{ $carModel->rangeOfCars->name }}
                        </span>
                        @endif

                        <div class="mb-6 space-y-3 text-gray-700">
                            <div>
                                <span class="font-semibold">Price:</span>
                                <span class="text-3xl font-bold text-teal-600 ml-2">{{ number_format($preownedCar->price, 0, ',', '.') }} VND</span>
                            </div>
                            <div><span class="font-semibold">Mileage:</span> {{ number_format($preownedCar->mileage, 0, ',', '.') }} km</div>
                            <div><span class="font-semibold">Condition:</span> {{ $preownedCar->condition ?? 'N/A' }}</div>
                            @if($inventory)
                            <div><span class="font-semibold">Exterior Color:</span> {{ $inventory->color ?? 'N/A' }}</div>
                            <div><span class="font-semibold">Interior Color:</span> {{ $inventory->interior_color ?? 'N/A' }}</div>
                            @endif
                            @if($preownedCar->purchase_date)
                                <div><span class="font-semibold">First Registered:</span> {{ \Carbon\Carbon::parse($preownedCar->purchase_date)->format('M Y') }}</div>
                            @endif
                        </div>

                        {{-- Call to Action: Test Drive for this specific preowned car --}}
                        <a href="{{ route('testdrive.form', ['inventory_id' => $preownedCar->inventory_id]) }}"
                           class="block w-full text-center bg-teal-600 text-white font-bold py-3.5 px-6 rounded-lg hover:bg-teal-700 transition-colors duration-300 text-lg shadow-md hover:shadow-lg mt-auto">
                            Request Test Drive / Inquire
                        </a>

                        @if($inventory && $inventory->features)
                            @php $features = json_decode($inventory->features); @endphp
                            @if(is_array($features) && count($features) > 0)
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Key Features:</h3>
                                <ul class="list-disc list-inside text-gray-600 space-y-1 text-sm">
                                    @foreach(array_slice($features, 0, 5) as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        @endif
                    </div>
                </div>

                {{-- Story / Detailed Description Section --}}
                <div class="px-6 md:px-8 py-8 border-t border-gray-200">
                    @if($preownedCar->story)
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-3">Vehicle Story & Condition</h2>
                        <div class="text-gray-700 text-base leading-relaxed space-y-4">
                            {!! nl2br(e($preownedCar->story)) !!}
                        </div>
                    </div>
                    @endif

                    @if($carModel->description)
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Model Overview ({{ $carModel->name }})</h3>
                        <div class="text-gray-600 text-sm leading-relaxed space-y-3">
                            {!! nl2br(e($carModel->description)) !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Related Pre-Owned Cars (Optional) --}}
            @if(isset($relatedPreownedCars) && $relatedPreownedCars->count() > 0)
            <section class="mt-12 md:mt-16">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 text-center">Other Pre-Owned Vehicles You Might Like</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedPreownedCars as $relatedCar)
                        @php
                            $relInventory = $relatedCar->inventory;
                            $relCarModel = $relInventory ? $relInventory->carModel : null;
                            $relBrand = $relCarModel ? $relCarModel->brand : null;
                        @endphp
                        @if($relCarModel && $relBrand)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden group flex flex-col hover:shadow-xl transition-shadow">
                            <a href="{{ route('preOwned.show', $relatedCar->id) }}" class="block">
                                <img src="{{ $relatedCar->image ? asset($relatedCar->image) : ($relCarModel->image ? asset($relCarModel->image) : asset('assets/images/default-car.png')) }}"
                                     alt="{{ $relBrand->name }} {{ $relCarModel->name }}"
                                     class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h4 class="font-semibold text-lg group-hover:text-teal-600 truncate">{{ $relBrand->name }} {{ $relCarModel->name }} ({{ $relCarModel->year }})</h4>
                                    <p class="text-teal-600 font-bold text-md">{{ number_format($relatedCar->price, 0, ',', '.') }} VND</p>
                                    <p class="text-xs text-gray-500">{{ number_format($relatedCar->mileage, 0, ',', '.') }} km</p>
                                </div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                </div>
            </section>
            @endif

        @else
            <div class="text-center py-20 bg-white rounded-xl shadow-lg">
                <p class="text-2xl text-gray-600">Sorry, this pre-owned vehicle could not be found.</p>
                <a href="{{ route('preOwned.index') }}" class="mt-6 inline-block bg-teal-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-teal-700">
                    Back to Pre-Owned Listings
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Bạn có thể thêm style tùy chỉnh nếu cần */
</style>
@endpush
