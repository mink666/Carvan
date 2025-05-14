@extends('layouts.app') {{-- Hoặc layout chính của bạn --}}

@section('title', 'Explore Vehicle Categories - Carvan')

@section('content')
<div class="bg-gray-50 min-h-screen">

    {{-- 1. Page Hero Section (Sử dụng ảnh nền) --}}
    <section class="page-hero relative text-white py-20 md:py-32 text-center bg-gray-700">
        {{-- Ảnh nền --}}
        <div class="absolute inset-0">
            <img src="{{ asset('images/banners/range_of_cars_banner.jpg') }}" {{-- THAY BẰNG ẢNH NỀN CỦA BẠN --}}
                 alt="Explore Car Categories"
                 class="w-full h-full object-cover opacity-40 md:opacity-50"> {{-- Điều chỉnh opacity --}}
        </div>
        {{-- Lớp phủ màu để làm nổi text --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/30 to-transparent"></div>

        {{-- Nội dung trên Banner --}}
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-3 filter drop-shadow-md">Vehicle Categories</h1>
            <p class="mt-4 text-lg md:text-xl text-gray-100 max-w-3xl mx-auto filter drop-shadow-sm">
                From spacious family SUVs and rugged pickup trucks to sleek sedans and sporty coupes, find the perfect vehicle type at Carvan that matches your lifestyle and driving preferences.
            </p>
        </div>
    </section>

    {{-- Ranges Grid --}}
    <div class="container mx-auto px-4 py-12 md:py-16">
        @if(isset($rangesOfCars) && $rangesOfCars->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 md:gap-x-8 md:gap-y-10">
                @foreach($rangesOfCars as $range)
                    <a href="{{ route('range_of_car.show', $range->id) }}"
                       class="range-card group block bg-white rounded-xl shadow-lg hover:shadow-2xl p-6 md:p-8 transition-all duration-300 ease-in-out transform hover:-translate-y-2 border border-gray-200 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        <div class="flex flex-col items-center text-center h-full">
                            {{-- Icon hoặc Hình ảnh đại diện cho Range --}}
                            <div class="mb-5 text-red-600 group-hover:text-red-700 transition-colors duration-300">
                                @php
                                    $iconHtml = '';
                                    // Chuẩn hóa tên để dễ so sánh hơn, loại bỏ các phần trong ngoặc
                                    $normalizedRangeName = strtolower(preg_replace('/\s*\(.*?\)\s*/', '', $range->name));
                                    switch ($normalizedRangeName) {
                                        case 'sedan':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 18L4.06 6.42a2.25 2.25 0 012.156-1.92h11.568a2.25 2.25 0 012.156 1.92L21.75 18M3.75 9.75h16.5M2.25 18h19.5M5.625 18a2.625 2.625 0 100-5.25 2.625 2.625 0 000 5.25zm12.75 0a2.625 2.625 0 100-5.25 2.625 2.625 0 000 5.25z"></path></svg>';
                                            break;
                                        case 'suv':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.988-1.18A10.536 10.536 0 0012 4.5c-4.286 0-7.875 2.088-10.112 5.054A1.125 1.125 0 012.25 10.5v8.25c0 .621.504 1.125 1.125 1.125H9.75"></path></svg>';
                                            break;
                                        case 'hatchback':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 3H2.525M3.269 3.126A59.768 59.768 0 0121.485 3m-18.216 0v1.5M2.525 3v1.5m18.96-1.5v1.5m-16.464 6L2.25 12l3.293 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-5.571 3m11.142 0L21.75 12l-4.179 2.25m0 4.5l5.571-3 5.571 3M2.25 12h19.5M2.25 16.5h19.5"></path></svg>';
                                            break;
                                        case 'pickup truck':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125V6.375c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v.001c0 .621.504 1.125 1.125 1.125z"></path></svg>';
                                            break;
                                        case 'coupe':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.625 18.75L3.375 12m0 0L5.625 5.25m0 13.5H18.375m0-13.5L20.625 12m0 0l-2.25 6.75M3.375 12h17.25"></path></svg>';
                                            break;
                                        case 'convertible':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 19.5l1.5-6m0 0L7.5 6M6 13.5h12M18 6l1.5 7.5m0 0l1.5 6M19.5 13.5H6M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
                                            break;
                                        case 'mpv':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5" /><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
                                            break;
                                        case 'sports car':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5L12 9l6.375-4.5"></path></svg>';
                                            break;
                                        case 'electric vehicle': case 'ev':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>';
                                            break;
                                        case 'hybrid':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v11.494m0 0a2.369 2.369 0 01-2.25-2.25H5.25A2.25 2.25 0 013 13.247V7.753A2.25 2.25 0 015.25 5.5h4.5A2.25 2.25 0 0112 7.753v-.001z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.375 6.165c1.563-.725 3.375.162 3.375 2.09v7.5c0 1.928-1.812 2.815-3.375 2.09A11.215 11.215 0 0112 17.747m0-11.494A11.215 11.215 0 0018.375 6.165"></path></svg>';
                                            break;
                                        default: // Icon mặc định
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>';
                                            break;
                                    }
                                @endphp
                                {!! $iconHtml !!}
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

            {{-- Pagination Links (Nếu bạn dùng paginate trong controller) --}}
            @if(isset($rangesOfCars) && $rangesOfCars instanceof \Illuminate\Pagination\LengthAwarePaginator)
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
