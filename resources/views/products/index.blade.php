@extends('layouts.app')

@section('content')
    <div class="products-page">
        <!-- Banner Section -->
        <section class="hero-banner-section">
            <div class="swiper hero-banner-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/banner-1.jpg') }}" class="ne-slide-image" alt="Our Products">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Discover Our Collection</h2>
                                <p>Find your perfect luxury car</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>

        <!-- Search Bar Section -->
        <div class="search-bar-container">
            <form action="{{ route('products.index') }}" method="GET" class="search-form">
                <div class="search-input-wrapper">
                    <input type="text" name="search" placeholder="Search by name, brand, model..."
                        value="{{ request('search') }}" class="search-input">
                    <button type="submit" class="search-button">
                        <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span>Search</span>
                    </button>
                </div>
                <div class="search-suggestions">
                    <div class="suggestion-title">Popular searches:</div>
                    <div class="suggestion-tags">
                        <a href="?search=Mercedes" class="suggestion-tag">Mercedes</a>
                        <a href="?search=BMW" class="suggestion-tag">BMW</a>
                        <a href="?search=SUV" class="suggestion-tag">SUV</a>
                        <a href="?search=Sedan" class="suggestion-tag">Sedan</a>
                        <a href="?type=preowned" class="suggestion-tag">Pre-owned Cars</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="products-container">
            <!-- Filter Section -->
            <div class="products-filter">
                <h3>Filters</h3>
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="filter-group">
                        <label>Brand</label>
                        <select name="brand" id="brandSelect" onchange="updateRanges()">
                            <option value="">All Brands</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Model Range</label>
                        <select name="range" id="rangeSelect">
                            <option value="">All Models</option>
                            @foreach ($ranges as $range)
                                <option value="{{ $range->id }}" {{ request('range') == $range->id ? 'selected' : '' }}>
                                    {{ $range->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Vehicle Type</label>
                        <select name="type">
                            <option value="">All Types</option>
                            <option value="new" {{ request('type') == 'new' ? 'selected' : '' }}>New Cars</option>
                            <option value="preowned" {{ request('type') == 'preowned' ? 'selected' : '' }}>Pre-owned Cars
                            </option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Price Range</label>
                        <select name="price_range">
                            <option value="">All Prices</option>
                            <option value="under_50000" {{ request('price_range') == 'under_50000' ? 'selected' : '' }}>
                                Under 1.000.000.000 VND</option>
                            <option value="50000_100000" {{ request('price_range') == '50000_100000' ? 'selected' : '' }}>
                                1.000.000.000 VND - 2.000.000.000 VND</option>
                            <option value="100000_200000"
                                {{ request('price_range') == '100000_200000' ? 'selected' : '' }}>
                                2.000.000.000 VND - 4.000.000.000 VND</option>
                            <option value="above_200000" {{ request('price_range') == 'above_200000' ? 'selected' : '' }}>
                                Above 4.000.000.000 VND</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Origin</label>
                        <select name="origin" id="originSelect">
                            <option value="">All Origins</option>
                            @foreach ($origins as $origin)
                                <option value="{{ $origin }}" {{ request('origin') == $origin ? 'selected' : '' }}>
                                    {{ $origin }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Year</label>
                        <select name="year">
                            <option value="">All Years</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit">Apply Filters</button>
                </form>
            </div>

            <!-- Products Listing -->
            <div class="products-listing">
                @forelse($products as $product)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group">
                        <div class="relative">
                            <a href="{{ route('products.show', $product->id) }}" class="block">
                                @if ($product->is_preowned && $product->preowned && $product->preowned->image)
                                    <img src="{{ asset('storage/' . $product->preowned->image) }}"
                                        alt="{{ $product->carModel->name ?? 'Car Image' }}"
                                        class="w-full h-56 md:h-64 object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
                                @elseif($product->carModel && $product->carModel->image)
                                    <img src="{{ asset('storage/' . $product->carModel->image) }}"
                                        alt="{{ $product->carModel->name ?? 'Car Image' }}"
                                        class="w-full h-56 md:h-64 object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
                                @else
                                    <div class="w-full h-56 md:h-64 bg-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <a href="{{ route('products.show', $product->id) }}" class="block">
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-red-700 transition-colors duration-300 mb-1 truncate"
                                    title="{{ $product->carModel->name ?? 'Unknown Model' }} {{ $product->carModel->year ? '(' . $product->carModel->year . ')' : '' }}">
                                    {{ $product->carModel->name ?? 'Unknown Model' }}
                                    {{ $product->carModel->year ? '(' . $product->carModel->year . ')' : '' }}
                                </h3>
                            </a>

                            <div class="flex items-center gap-2 mb-2">
                                <span
                                    class="text-sm text-gray-600">{{ $product->carModel->brand->name ?? 'Unknown Brand' }}</span>
                                @if ($product->carModel && $product->carModel->rangeOfCars)
                                    <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">
                                        {{ $product->carModel->rangeOfCars->name }}
                                    </span>
                                @endif
                            </div>

                            @if ($product->carModel && $product->carModel->description)
                                <p class="text-gray-600 text-sm mb-4 flex-grow line-clamp-3">
                                    {{ Str::limit($product->carModel->description, 100) }}
                                </p>
                            @endif

                            <div class="mt-auto">
                                <p class="text-lg font-semibold text-red-600 mb-4">
                                    Price: {{ number_format($product->price ?? 0, 0, ',', '.') }} VND
                                </p>

                                @if ($product->is_preowned && $product->preowned)
                                    <p class="text-sm text-gray-600 mb-4">
                                        Mileage: {{ number_format($product->preowned->mileage ?? 0) }} km
                                    </p>
                                @endif

                                <a href="{{ route('products.show', $product->carModel->id) }}" class="view-details-btn">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <p class="text-xl text-gray-500">No products found.</p>
                        <p class="text-gray-400 mt-2">Please try different filters.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            {{ $products->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            function updateRanges() {
                const brandSelect = document.getElementById('brandSelect');
                const rangeSelect = document.getElementById('rangeSelect');
                const originSelect = document.getElementById('originSelect');
                const selectedBrand = brandSelect.value;

                // Clear current options except the first one
                while (rangeSelect.options.length > 1) {
                    rangeSelect.remove(1);
                }
                while (originSelect.options.length > 1) {
                    originSelect.remove(1);
                }

                // Nếu không chọn brand, hiển thị tất cả ranges và origins
                if (!selectedBrand) {
                    // Lấy tất cả ranges
                    fetch('/get-ranges-by-brand/all')
                        .then(response => response.json())
                        .then(ranges => {
                            ranges.forEach(range => {
                                const option = new Option(range.name, range.id);
                                rangeSelect.add(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Có lỗi xảy ra khi tải danh sách model range');
                        });

                    // Lấy tất cả origins
                    fetch('/get-origins-by-brand/all')
                        .then(response => response.json())
                        .then(origins => {
                            origins.forEach(origin => {
                                const option = new Option(origin, origin);
                                originSelect.add(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Có lỗi xảy ra khi tải danh sách xuất xứ');
                        });
                } else {
                    // Lấy ranges theo brand
                    fetch(`/get-ranges-by-brand/${selectedBrand}`)
                        .then(response => response.json())
                        .then(ranges => {
                            ranges.forEach(range => {
                                const option = new Option(range.name, range.id);
                                rangeSelect.add(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Có lỗi xảy ra khi tải danh sách model range');
                        });

                    // Lấy origins theo brand
                    fetch(`/get-origins-by-brand/${selectedBrand}`)
                        .then(response => response.json())
                        .then(origins => {
                            origins.forEach(origin => {
                                const option = new Option(origin, origin);
                                originSelect.add(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Có lỗi xảy ra khi tải danh sách xuất xứ');
                        });
                }
            }

            // Gọi hàm updateRanges khi trang được tải để khởi tạo dữ liệu
            document.addEventListener('DOMContentLoaded', function() {
                const brandSelect = document.getElementById('brandSelect');
                if (brandSelect.value) {
                    updateRanges();
                }
            });
        </script>
    @endpush
@endsection
