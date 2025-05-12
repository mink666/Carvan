@extends('layouts.app')

@section('title', 'Car Brands - Carvan')

@section('content')
<div class="bg-gray-50 min-h-screen">

    <section class="page-header bg-gradient-to-r from-gray-800 via-gray-900 to-black text-white py-16 md:py-24">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Our Esteemed Brands</h1>
            <p class="mt-4 text-lg md:text-xl text-gray-300 max-w-2xl mx-auto">
                Discover the heritage and innovation behind each automotive brand we proudly represent at Carvan.
            </p>
        </div>
    </section>

    <div class="container mx-auto px-4 py-12 md:py-16">
        @if($brands && $brands->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 md:gap-6 lg:gap-8">
                @foreach($brands as $brand)
                    <a href="{{ route('brands.show', $brand->id) }}"
                       class="brand-card group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-1 aspect-square border border-gray-100">
                        <div class="flex-grow flex items-center justify-center w-full">
                            @if($brand->logo)
                                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }} Logo"
                                     class="max-h-20 md:max-h-24 object-contain transition-transform duration-300 group-hover:scale-110">
                            @else
                                <div class="w-20 h-20 md:w-24 md:h-24 bg-gray-200 flex items-center justify-center rounded-full text-gray-400 group-hover:bg-gray-300 transition-colors">
                                    <svg class="w-10 h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg> {{-- Icon người dùng placeholder --}}
                                </div>
                            @endif
                        </div>
                        <h2 class="mt-4 text-sm md:text-base font-semibold text-gray-700 group-hover:text-red-600 transition-colors text-center truncate w-full" title="{{ $brand->name }}">
                            {{ $brand->name }}
                        </h2>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-xl text-gray-500">No brands available at the moment.</p>
                <p class="text-gray-400 mt-2">Please check back soon!</p>
            </div>
        @endif
    </div>
</div>
@endsection

