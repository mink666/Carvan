@extends('layouts.app')

@section('title', 'Ranges of Car - Carvan')

@section('content')
<div class="bg-gray-50 min-h-screen">

<section class="page-hero relative text-white py-20 md:py-32 text-center bg-gray-700">
    <div class="absolute inset-0 bg-gradient-to-br from-sky-700 via-indigo-800 to-purple-900 opacity-60 md:opacity-75">
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/40 to-transparent"></div>
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-3 filter drop-shadow-md">Vehicle Categories</h1>
        <p class="mt-4 text-lg md:text-xl text-gray-100 max-w-3xl mx-auto filter drop-shadow-sm">
            From spacious family SUVs and rugged pickup trucks to sleek sedans and sporty coupes, find the perfect vehicle type at Carvan that matches your lifestyle and driving preferences.
        </p>
    </div>
</section>

    <div class="container mx-auto px-4 py-12 md:py-16">
        @if(isset($rangesOfCars) && $rangesOfCars->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 md:gap-x-8 md:gap-y-10">
                @foreach($rangesOfCars as $range)
                    <a href="{{ route('range_of_car.show', $range->id) }}"
                       class="range-card group block bg-white rounded-xl shadow-lg hover:shadow-2xl p-6 md:p-8 transition-all duration-300 ease-in-out transform hover:-translate-y-2 border border-gray-200 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        <div class="flex flex-col items-center text-center h-full">
                            <div class="mb-5 text-red-600 group-hover:text-red-700 transition-colors duration-300">
                                <x-range-icon :range="$range" />
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800 group-hover:text-sky-700 transition-colors duration-300 mb-2 flex-grow">
                                {{ $range->name }}
                            </h2>
                            <p class="text-sm text-gray-600 group-hover:text-gray-700 transition-colors">
                                {{ Str::limit($range->description, 60) }}
                            </p>
                            <span class="mt-4 inline-block text-sky-600 group-hover:text-sky-800 text-xs font-semibold tracking-wider uppercase">
                                Explore Models &rarr;
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

            @if($rangesOfCars instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="mt-12">
                    {{ $rangesOfCars->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-xl text-gray-500">No vehicle categories available at the moment.</p>
                <p class="text-gray-400 mt-2">Please check back soon!</p>
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .range-card svg {
        transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
    }
    .range-card:hover svg {
        transform: scale(1.1);
    }
</style>
@endpush
