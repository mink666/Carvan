@extends('layouts.app') {{-- Hoặc layout chính của bạn --}}

@section('title', 'Car Ranges - Carvan')

@section('content')
<div class="bg-gray-50 min-h-screen">

    {{-- Page Header --}}
    <section class="page-header bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 text-white py-16 md:py-24">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Vehicle Categories</h1>
            <p class="mt-4 text-lg md:text-xl text-blue-100 max-w-2xl mx-auto">
                Find the perfect type of vehicle that matches your lifestyle, from spacious SUVs to agile city cars.
            </p>
        </div>
    </section>

    {{-- Ranges Grid --}}
    <div class="container mx-auto px-4 py-12 md:py-16">
        @if(isset($rangesOfCars) && $rangesOfCars->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach($rangesOfCars as $range)
                    <a href="{{ route('range_of_car.show', $range->id) }}" {{-- Link đến trang chi tiết của dòng xe --}}
                       class="range-card group block bg-white rounded-xl shadow-lg hover:shadow-2xl p-6 transition-all duration-300 ease-in-out transform hover:-translate-y-1.5 border border-transparent hover:border-blue-300">
                        <div class="flex flex-col items-center text-center h-full">
                            {{-- Icon hoặc Hình ảnh đại diện cho Range --}}
                            <div class="mb-4 text-blue-600 group-hover:text-blue-700 transition-colors">
                                {{-- Sử dụng SVG Icon Placeholder - Bạn nên thay bằng icon SVG thực tế cho từng dòng xe --}}
                                @if(strtolower($range->name) === 'sedan')
                                    <svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 18L4.06 6.42a2.25 2.25 0 012.156-1.92h11.568a2.25 2.25 0 012.156 1.92L21.75 18M3.75 9.75h16.5M2.25 18h19.5M5.625 18a2.625 2.625 0 100-5.25 2.625 2.625 0 000 5.25zm12.75 0a2.625 2.625 0 100-5.25 2.625 2.625 0 000 5.25z"></path></svg>
                                @elseif(strtolower($range->name) === 'suv')
                                    <svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.988-1.18A10.536 10.536 0 0012 4.5c-4.286 0-7.875 2.088-10.112 5.054A1.125 1.125 0 012.25 10.5v8.25c0 .621.504 1.125 1.125 1.125H9.75"></path></svg>
                                @elseif(strtolower($range->name) === 'hatchback')
                                     <svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-5.571 3m11.142 0L21.75 12l-4.179 2.25m0 4.5l5.571-3 5.571 3m-11.142 0L21.75 16.5 12 21.75l-9.75-5.25 5.571-3"></path></svg> {{-- Example: cube icon as placeholder --}}
                                @elseif(strtolower($range->name) === 'pickup truck')
                                     <svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125V6.375c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v.001c0 .621.504 1.125 1.125 1.125z"></path></svg>
                                @else {{-- Icon mặc định --}}
                                    <svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> {{-- Icon xe hơi chung chung --}}
                                @endif
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800 group-hover:text-blue-700 transition-colors mb-2 flex-grow">
                                {{ $range->name }}
                            </h2>
                            <p class="text-xs text-gray-500 group-hover:text-gray-600">
                                {{ Str::limit($range->description, 50) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-xl text-gray-500">No vehicle ranges available at the moment.</p>
                <p class="text-gray-400 mt-2">Please check back soon!</p>
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Tùy chỉnh nhỏ cho hiệu ứng của range card nếu muốn */
    .range-card svg {
        transition: transform 0.3s ease-in-out;
    }
    .range-card:hover svg {
        transform: scale(1.1);
    }
</style>
@endpush
