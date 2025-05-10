@extends('layouts.app')

@section('title', $brand->name . ' - Car Models and Information')

@section('content')
<div class="bg-gray-100">

    {{-- 1. Brand Hero Section (Banner/Thông tin nổi bật) --}}
    <section class="brand-hero bg-gradient-to-r from-gray-700 via-gray-800 to-black text-white py-12 md:py-20">
        <div class="container mx-auto px-4 text-center">
            @if($brand->logo)
                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }} Logo" class="h-20 md:h-28 mx-auto mb-6 object-contain filter drop-shadow-lg">
            @else
                {{-- Placeholder nếu không có logo, hiển thị chữ cái đầu của tên hãng --}}
                <div class="w-24 h-24 md:w-32 md:h-32 bg-gray-600 flex items-center justify-center mx-auto mb-6 rounded-full shadow-lg">
                    <span class="text-4xl md:text-5xl font-semibold text-white">{{ Str::substr($brand->name, 0, 1) }}</span>
                </div>
            @endif
            <h1 class="text-4xl md:text-5xl font-bold mb-3">{{ $brand->name }}</h1>
            {{-- Hiển thị một phần ngắn của description ở đây nếu có, nếu không thì có thể là một tagline chung --}}
            <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
                @if($brand->description)
                    {{ Str::limit($brand->description, 150) }}
                @else
                    Discover the an_array_of_finest collection of an_array_of_vehicles from {{ $brand->name }}.
                @endif
            </p>
            @if($brand->year || $brand->location)
                <div class="mt-4 text-sm text-gray-400">
                    @if($brand->year)
                        <span>Established: {{ $brand->year }}</span>
                    @endif
                    @if($brand->year && $brand->location)
                        <span class="mx-2">|</span>
                    @endif
                    @if($brand->location)
                        <span>Headquarters: {{ $brand->location }}</span>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <div class="container mx-auto px-4 py-8 md:py-12">

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

        {{-- 2. Brand Description Section (Simpler Styling) --}}
        @if($brand->description)
        <section id="brand-description" class="mb-10 md:mb-16 bg-white p-6 md:p-10 rounded-xl shadow-xl">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 border-b border-gray-200 pb-4">
                About {{ $brand->name }}
            </h2>
            {{-- Styling cho khối văn bản mô tả --}}
            <div class="text-gray-700 text-base md:text-lg leading-relaxed space-y-5">
                {{-- nl2br(e($brand->description)) sẽ chuyển \n thành <br> và escape HTML entities --}}
                {{-- Nếu description đã là HTML an toàn từ admin, bạn có thể dùng {!! $brand->description !!} nhưng CẨN THẬN XSS --}}
                {!! nl2br(e($brand->description)) !!}
            </div>
        </section>
        @endif

        {{-- 3. Car Models Section --}}
        <section id="car-models" class="pt-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 text-center">
                Models from <span class="text-red-600">{{ $brand->name }}</span>
            </h2>
            @if($brand->carModels && $brand->carModels->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                    @foreach($brand->carModels as $model)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden group flex flex-col hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-1.5">
                            <a href="{{ route('car_models.show', $model->id) }}" class="block overflow-hidden">
                                @if($model->image)
                                    <img src="{{ asset($model->image) }}" alt="{{ $model->name }}" class="w-full h-56 object-cover transform group-hover:scale-105 transition-transform duration-500 ease-in-out">
                                @else
                                    <div class="w-full h-56 bg-gray-200 flex items-center justify-center rounded-t-xl"> {{-- Thêm rounded-t-xl --}}
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </a>
                            <div class="p-5 flex flex-col flex-grow">
                                <a href="{{ route('car_models.show', $model->id) }}" class="block">
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
                                <a href="{{ route('car_models.show', $model->id) }}"
                                   class="mt-auto inline-block w-full text-center bg-red-600 text-white font-semibold py-2.5 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition-colors duration-300">
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
                    <p class="text-gray-400 mt-2">Please check back later or explore other brands.</p>
                     <a href="{{ route('brands.index') }}"
                       class="mt-6 inline-block bg-red-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-red-600 transition-colors duration-300">
                        Explore Other Brands
                    </a>
                </div>
            @endif
        </section>
    </div>
</div>
@endsection
