@extends('layouts.app')

@section('title', $brand->name . ' - Carvan')

@section('content')
<div class="bg-gray-100">

    {{-- 1. Brand Banner Section --}}
    <section class="brand-banner relative text-white py-20 md:py-32 text-center bg-gray-700">
        @if($brand->cover_image)
            <div class="absolute inset-0 opacity-70">
                <img src="{{ asset($brand->cover_image) }}" alt="{{ $brand->name }} Cover Image"
                     class="w-full h-full object-cover opacity-40">
            </div>
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-slate-700 via-slate-800 to-gray-900"></div>
        @endif

        <div class="container mx-auto px-4 relative z-10">
            @if($brand->logo)
                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }} Logo"
                     class="h-20 md:h-28 lg:h-32 mx-auto mb-6 object-contain filter drop-shadow-xl">
            @else
                <div class="w-24 h-24 md:w-32 md:h-32 bg-gray-600 bg-opacity-50 flex items-center justify-center mx-auto mb-6 rounded-full shadow-lg">
                    <span class="text-4xl md:text-5xl font-semibold text-white">{{ Str::substr($brand->name, 0, 1) }}</span>
                </div>
            @endif

            @if($brand->motto)
                <p class="text-xl md:text-2xl lg:text-3xl font-light text-gray-100 italic max-w-3xl mx-auto shadow-text">
                    "{{ $brand->motto }}"
                </p>
            @elseif($brand->description)
                 <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto shadow-text">
                    {{ Str::words(strip_tags($brand->description), 15, '...') }}
                </p>
            @endif
        </div>
    </section>

    <div class="container mx-auto px-4 py-10 md:py-12">

        {{-- Breadcrumbs --}}
        <nav class="text-sm mb-8 md:mb-12" aria-label="Breadcrumb">
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

        {{-- 2. Brand Profile Section --}}
        <section id="brand-profile" class="mb-12 md:mb-16 bg-white p-6 md:p-10 rounded-xl shadow-2xl">
            <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                <div class="lg:col-span-1 space-y-5">
                    <h2 class="text-3xl font-bold text-gray-900 leading-tight border-b border-gray-200 pb-3">
                        {{ $brand->company_full_name ?? $brand->name }}
                    </h2>
                    @if($brand->founder)
                    <div>
                        <p class="text-sm font-medium text-gray-500">Founder</p>
                        <p class="text-lg text-gray-800">{{ $brand->founder }}</p>
                    </div>
                    @endif
                    @if($brand->year)
                    <div>
                        <p class="text-sm font-medium text-gray-500">Established</p>
                        <p class="text-lg text-gray-800">{{ $brand->year }}</p>
                    </div>
                    @endif
                    @if($brand->location)
                    <div>
                        <p class="text-sm font-medium text-gray-500">Headquarters</p>
                        <p class="text-lg text-gray-800">{{ $brand->location }}</p>
                    </div>
                    @endif
                    @if($brand->website_url)
                    <div>
                        <p class="text-sm font-medium text-gray-500">Available at:</p>
                        <a href="{{ $brand->website_url }}" target="_blank" rel="noopener noreferrer"
                           class="text-lg text-red-600 hover:text-red-800 hover:underline break-all">
                           {{$brand->name}} Official Website &rarr;
                        </a>
                    </div>
                    @endif
                </div>

                <div class="lg:col-span-2">
                    @if($brand->description)
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Our Story</h3>
                            <div class="text-gray-700 text-base leading-relaxed space-y-4">
                                {!! nl2br(e($brand->description)) !!}
                            </div>
                        </div>
                    @endif

                    @php
                        $achievements = [];
                        if (!is_null($brand->key_achievements)) {
                            if (is_array($brand->key_achievements)) {
                                $achievements = $brand->key_achievements;
                            } else {
                                $decoded = json_decode($brand->key_achievements, true);
                                if (is_array($decoded)) {
                                    $achievements = $decoded;
                                }
                            }
                        }
                    @endphp

                    @if(count($achievements) > 0)
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Key Milestones & Achievements</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-2 pl-1">
                                @foreach($achievements as $achievement)
                                    <li class="text-base">{{ $achievement }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p>No achievements to display.</p>
                    @endif
                </div>
            </div>
        </section>

        {{-- 3. Car Models Section --}}
        <section id="car-models" class="pt-8">
             <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 text-center">
                Explore Our <span class="text-red-600">{{ $brand->name }}</span> Collection
            </h2>
            @if($brand->carModels && $brand->carModels->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                    @foreach($brand->carModels as $model)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden group flex flex-col hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-1.5">
                            <a href="{{ route('products.show', $model->id) }}" class="block overflow-hidden">
                                @if($model->image)
                                    <img src="{{ asset($model->image) }}" alt="{{ $model->name }}" class="w-full h-56 object-cover transform group-hover:scale-105 transition-transform duration-500 ease-in-out">
                                @else
                                    <div class="w-full h-56 bg-gray-200 flex items-center justify-center rounded-t-xl">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </a>
                            <div class="p-5 flex flex-col flex-grow">
                                <a href="{{ route('products.show', $model->id) }}" class="block">
                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-red-700 transition-colors duration-300 mb-1 truncate" title="{{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}">
                                        {{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}
                                    </h3>
                                </a>
                                @if($model->rangeOfCars)
                                    <p class="text-xs text-gray-500 mb-2 bg-gray-100 px-2 py-0.5 rounded-full self-start">{{ $model->rangeOfCars->name }}</p>
                                @endif
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
                                <a href="{{ route('products.show', $model->id) }}"
                                   class="mt-auto inline-block w-full text-center bg-red-400 text-white font-semibold py-2.5 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition-colors duration-300">
                                    View Model Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                     <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-xl text-gray-500">There are currently no models listed for {{ $brand->name }}.</p>
                </div>
            @endif
        </section>

    </div>
</div>
@endsection

@push('styles')
<style>
    .shadow-text {
        text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
    }
</style>
@endpush
