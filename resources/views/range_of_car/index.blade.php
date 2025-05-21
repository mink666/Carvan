@extends('layouts.app') {{-- Hoặc layout chính của bạn --}}

@section('title', 'Explore Vehicle Categories - Carvan')

@section('content')
<div class="bg-gray-50 min-h-screen">

{{-- 1. Page Hero Section--}}
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
                                    // Bạn có thể thêm một biến để kiểm soát stroke-width chung nếu muốn
                                    // $strokeWidth = "1.5"; // Hoặc "2"

                                    switch ($normalizedRangeName) {
                                        case 'sedan':
                                            // Giữ lại icon Sedan tùy chỉnh của bạn nếu bạn thích nó
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 18L4.06 6.42a2.25 2.25 0 012.156-1.92h11.568a2.25 2.25 0 012.156 1.92L21.75 18M3.75 9.75h16.5M2.25 18h19.5M5.625 18a2.625 2.625 0 100-5.25 2.625 2.625 0 000 5.25zm12.75 0a2.625 2.625 0 100-5.25 2.625 2.625 0 000 5.25z"></path></svg>';
                                            break;
                                        case 'suv':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 17H3V11L5 6H16L18 11V17H17M7 17H14M5 11H16M13 11V6"></path><rect x="3" y="14" width="18" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></rect><circle cx="7" cy="17" r="2" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle><circle cx="17" cy="17" r="2" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle></svg>';
                                            break;
                                        case 'hatchback':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 17H3V11L5 6H14L16 11H18A2 2 0 0 1 20 13V17H19M15 17H9M5 11H16M14 11V6"></path><circle cx="7" cy="17" r="2" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle><circle cx="17" cy="17" r="2" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle></svg>';
                                            break;
                                        case 'pickup truck':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125V6.375c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v.001c0 .621.504 1.125 1.125 1.125z"></path></svg>';
                                            break;
                                        case 'coupe':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.625 18.75L3.375 12m0 0L5.625 5.25m0 13.5H18.375m0-13.5L20.625 12m0 0l-2.25 6.75M3.375 12h17.25"></path></svg>';
                                            break;
                                        case 'convertible':
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" stroke="currentColor" fill="none" version="1.1" id="Layer_1_convertible" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 203 203" xml:space="preserve">' .
                                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="8" d="M175.014,79.7h-24.821l-28.875-28.875c-1.367-1.367-3.582-1.367-4.949,0s-1.367,3.582,0,4.949L140.294,79.7H63V69.2h-7 v10.5H14.39c-1.641,0-3.061,1.138-3.416,2.741l-10.89,49c-0.231,1.036,0.022,2.119,0.685,2.95 c0.665,0.827,1.669,1.309,2.731,1.309h14.316c1.674,9.916,10.298,17.5,20.684,17.5s19.01-7.584,20.684-17.5h77.632 c1.674,9.916,10.298,17.5,20.684,17.5c10.456,0,19.125-7.687,20.715-17.702C192.143,133.884,203,122.039,203,107.7 C203,92.261,190.446,79.7,175.014,79.7z M14.086,100.7h7.955l-2.316,6.669l-7.175,0.24L14.086,100.7z M38.5,146.2 c-7.72,0-14-6.279-14-14c0-7.721,6.28-14,14-14c7.72,0,14,6.279,14,14C52.5,139.921,46.219,146.2,38.5,146.2z M157.5,146.2 c-7.72,0-14-6.279-14-14c0-7.721,6.28-14,14-14c7.72,0,14,6.279,14,14C171.5,139.921,165.219,146.2,157.5,146.2z M178.166,128.457c-0.01-0.057-0.035-0.109-0.046-0.166c-0.201-1.064-0.492-2.094-0.848-3.095 c-0.065-0.184-0.13-0.365-0.201-0.547c-0.38-0.982-0.826-1.929-1.344-2.833c-0.087-0.152-0.181-0.298-0.272-0.448 c-0.556-0.918-1.164-1.8-1.849-2.619c-0.055-0.066-0.117-0.125-0.174-0.191c-0.694-0.81-1.449-1.564-2.257-2.26 c-0.072-0.062-0.137-0.13-0.21-0.191c-0.817-0.685-1.695-1.293-2.611-1.849c-0.151-0.092-0.297-0.186-0.45-0.274 c-0.905-0.519-1.853-0.968-2.836-1.35c-0.177-0.069-0.354-0.131-0.533-0.195c-1.007-0.359-2.042-0.655-3.113-0.858 c-0.146-0.028-0.294-0.043-0.441-0.068c-1.135-0.191-2.294-0.314-3.483-0.314c-1.204,0-2.376,0.125-3.525,0.32 c-0.139,0.024-0.28,0.037-0.418,0.064c-1.083,0.207-2.13,0.508-3.148,0.874c-0.175,0.063-0.348,0.124-0.52,0.191 c-0.992,0.387-1.946,0.846-2.858,1.373c-0.154,0.089-0.302,0.183-0.454,0.276c-0.916,0.561-1.792,1.177-2.608,1.867 c-0.09,0.077-0.173,0.16-0.261,0.238c-0.837,0.731-1.625,1.516-2.336,2.369c-0.013,0.015-0.027,0.028-0.04,0.044 c-0.709,0.854-1.333,1.777-1.901,2.737c-0.073,0.123-0.152,0.24-0.222,0.365c-0.524,0.929-0.969,1.905-1.349,2.914 c-0.065,0.172-0.128,0.342-0.189,0.516c-0.351,1.013-0.628,2.057-0.821,3.133c-0.013,0.075-0.045,0.144-0.057,0.219H59.208 c-0.013-0.075-0.044-0.144-0.057-0.219c-0.193-1.076-0.47-2.12-0.821-3.133c-0.061-0.174-0.124-0.344-0.189-0.516 c-0.38-1.009-0.825-1.986-1.349-2.914c-0.07-0.125-0.149-0.242-0.222-0.365c-0.568-0.96-1.192-1.883-1.901-2.737 c-0.013-0.015-0.027-0.029-0.04-0.044c-0.712-0.853-1.5-1.638-2.336-2.369c-0.089-0.078-0.171-0.161-0.261-0.238 c-0.816-0.69-1.692-1.306-2.608-1.867c-0.152-0.093-0.3-0.187-0.454-0.276c-0.912-0.527-1.866-0.986-2.858-1.373 c-0.173-0.067-0.345-0.128-0.52-0.191c-1.017-0.366-2.064-0.667-3.148-0.874c-0.138-0.026-0.279-0.04-0.418-0.064 c-1.149-0.195-2.322-0.32-3.525-0.32s-2.376,0.125-3.525,0.32c-0.139,0.024-0.28,0.037-0.418,0.064 c-1.083,0.207-2.13,0.508-3.148,0.874c-0.175,0.063-0.348,0.124-0.52,0.191c-0.992,0.387-1.946,0.846-2.858,1.373 c-0.154,0.089-0.302,0.183-0.454,0.276c-0.916,0.561-1.792,1.177-2.608,1.867c-0.09,0.077-0.173,0.16-0.261,0.238 c-0.836,0.731-1.625,1.516-2.336,2.369c-0.013,0.015-0.027,0.028-0.04,0.044c-0.709,0.854-1.333,1.777-1.901,2.737 c-0.073,0.123-0.152,0.24-0.222,0.365c-0.524,0.929-0.969,1.905-1.349,2.914c-0.065,0.172-0.128,0.342-0.189,0.516 c-0.351,1.013-0.628,2.057-0.821,3.133c-0.013,0.075-0.045,0.144-0.057,0.219h-9.93l3.12-14.038l11.376-0.379 c1.448-0.048,2.716-0.981,3.191-2.348l4.718-13.586c0.371-1.07,0.202-2.253-0.455-3.179c-0.656-0.923-1.719-1.47-2.852-1.47 H15.641l1.556-7H56h7h112.014c8.538,0,15.887,5.135,19.162,12.475l-12.17-5.42c-1.764-0.793-3.833,0.004-4.621,1.771 c-0.786,1.767,0.008,3.835,1.774,4.621l16.837,7.499h0.002c0,0.018,0.003,0.036,0.003,0.054 C196,118.193,188.25,126.916,178.166,128.457z" />' .
                                                '<circle stroke-linecap="round" stroke-linejoin="round" stroke-width="8" cx="157.5" cy="132.2" r="7" />' .
                                                '<circle stroke-linecap="round" stroke-linejoin="round" stroke-width="8" cx="38.5" cy="132.2" r="7" />' .
                                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="8" d="M129.5,89.971H119c-1.933,0-3.5,1.566-3.5,3.5c0,1.934,1.567,3.5,3.5,3.5h10.5c1.933,0,3.5-1.566,3.5-3.5 C133,91.537,131.433,89.971,129.5,89.971z" />' .
                                            '</svg>';                                            break;
                                        case 'mpv':
                                            // Giữ lại icon MPV tùy chỉnh của bạn
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5" /><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
                                            // Gợi ý thay thế bằng Heroicons "truck" (đã dùng ở trên) hoặc "archive-box" (stroke-width="1.5")
                                            // $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>';
                                            break;
                                        case 'sports car':
                                            // Giữ lại icon Sports Car tùy chỉnh của bạn
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5L12 9l6.375-4.5"></path></svg>';
                                            break;
                                        case 'electric vehicle': case 'ev':
                                            // Giữ nguyên icon EV từ Heroicons (stroke-width="2")
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>';
                                            break;
                                        case 'hybrid':
                                            // Giữ lại icon Hybrid tùy chỉnh của bạn
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v11.494m0 0a2.369 2.369 0 01-2.25-2.25H5.25A2.25 2.25 0 013 13.247V7.753A2.25 2.25 0 015.25 5.5h4.5A2.25 2.25 0 0112 7.753v-.001z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.375 6.165c1.563-.725 3.375.162 3.375 2.09v7.5c0 1.928-1.812 2.815-3.375 2.09A11.215 11.215 0 0112 17.747m0-11.494A11.215 11.215 0 0018.375 6.165"></path></svg>';
                                            // Gợi ý thay thế bằng Heroicons "leaf" (stroke-width="1.5")
                                            // $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 12c0-5.034-4.036-9.103-9-9.19V2.75c0-.414-.336-.75-.75-.75S9 2.336 9 2.75v.057A9.003 9.003 0 004.5 12H3.75c-.414 0-.75.336-.75.75s.336.75.75.75H4.5c.196 2.077.925 3.99 2.038 5.5H9v2.703c0 .414.336.75.75.75s.75-.336.75-.75V18.5h2.783A9.008 9.008 0 0019.5 12h.75c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-.75zM9 12a3 3 0 116 0 3 3 0 01-6 0z"></path></svg>';
                                            break;
                                        default:
                                            // Giữ nguyên icon Default từ Heroicons (stroke-width="2")
                                            $iconHtml = '<svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>'; // Đây là icon "identification" của Heroicons
                                            break;
                                    }
                                @endphp

                                {!! $iconHtml !!} {{-- Hoặc cách bạn hiển thị $iconHtml --}}
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
