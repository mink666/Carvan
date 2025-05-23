@extends('layouts.app')

@section('title', 'New Products - Carvan')

@section('content')
    <div class="products-page">
        <!-- Banner Section -->
        <section class="hero-banner-section">
            <div class="swiper hero-banner-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/preowned/car-model.png') }}" class="ne-slide-image" alt="Our Products">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Discover Our Collection</h2>
                                <p>Find your perfect luxury car</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/preowned/banner-preowned.png') }}" class="ne-slide-image"
                                alt="Pre-Owned Vehicles">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Pre-Owned Collection</h2>
                                <p>Quality assured pre-owned luxury vehicles</p>
                                <a href="{{ route('preowned.index') }}" class="preowned-button">
                                    View Pre-Owned Cars
                                </a>
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
                        <a href="{{ route('preowned.index') }}" class="suggestion-tag">Pre-owned Cars</a>
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

            <!-- Product Details Modal -->
            <div id="productModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen p-4">
                    <div class="fixed inset-0 bg-black opacity-50"></div>
                    <div class="relative bg-white rounded-lg shadow-xl max-w-4xl w-full mx-4">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 border-b">
                            <h3 class="text-2xl font-semibold text-gray-900" id="modalTitle"></h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                onclick="closeProductModal()">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <img id="modalImage" class="w-full h-auto rounded-lg" src=""
                                        alt="Product Image">
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Model details</h4>
                                        <p id="modalDescription" class="mt-2 text-gray-600"></p>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="flex items-center">
                                            <span class="text-gray-600 w-32">Brand:</span>
                                            <span id="modalBrand" class="font-medium"></span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-600 w-32">Range:</span>
                                            <span id="modalRange" class="font-medium"></span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-600 w-32">Year:</span>
                                            <span id="modalYear" class="font-medium"></span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-600 w-32">Color:</span>
                                            <span id="modalColor" class="font-medium"></span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-600 w-32">Interior:</span>
                                            <span id="modalInterior" class="font-medium"></span>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Features</h4>
                                        <ul id="modalFeatures" class="mt-2 space-y-2 list-disc list-inside text-gray-600">
                                        </ul>
                                    </div>
                                    <div class="mt-6">
                                        <div class="text-3xl font-bold text-red-600" id="modalPrice"></div>
                                        <div class="mt-4 flex gap-4">
                                            <a href="#" id="modalDetailLink"
                                                class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                                                View details
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Listing -->
            <div class="products-listing">
                @forelse($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <a href="{{ route('products.show', $product->id) }}">
                                @if ($product->carModel && $product->carModel->image)
                                    <img src="{{ asset($product->carModel->image) }}"
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
                                <span
                                    class="absolute top-3 left-3 bg-green-600 text-white text-xs font-bold px-2.5 py-1 rounded">NEW</span>
                            </a>
                        </div>
                        <div class="p-5">
                            <a href="{{ route('products.show', $product->id) }}">
                                <h3 class="text-xl font-bold text-gray-900 mb-1">
                                    {{ $product->carModel->brand->name ?? 'Unknown Brand' }}
                                    {{ $product->carModel->name ?? 'Unknown Model' }}
                                    {{ $product->carModel->year ? '(' . $product->carModel->year . ')' : '' }}
                                </h3>
                            </a>

                            <div class="description">
                                <p><strong>Range:</strong> {{ $product->carModel->rangeOfCars->name ?? 'N/A' }}</p>
                                <p><strong>Color:</strong> {{ $product->color ?? 'N/A' }}</p>
                                <p><strong>Interior:</strong> {{ $product->interior_color ?? 'N/A' }}</p>
                            </div>

                            <div class="mt-auto">
                                <p class="text-2xl font-bold text-red-600 mb-4">
                                    {{ number_format($product->price, 0, ',', '.') }} VND
                                </p>

                                <div class="flex gap-2">
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="bg-red-400 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-300 text-center flex-1">
                                        View Details
                                    </a>
                                    <button type="button" class="compare-btn" onclick="openComparisonPopup()"
                                        id="compare-btn-{{ $product->id }}">
                                        Compare
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-car-alt"></i>
                        <p>No vehicles available at the moment.</p>
                        <p>Please try different filters or check back later.</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <div class="pagination-container">
                        @if ($products->hasPages())
                            <div class="pagination-wrapper flex items-center gap-2">
                                {{-- Previous Page Link --}}
                                @if ($products->onFirstPage())
                                    <span class="pagination-btn disabled">Previous</span>
                                @else
                                    <a href="{{ $products->previousPageUrl() }}" class="pagination-btn">Previous</a>
                                @endif

                                {{-- Page Numbers --}}
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    @if ($i == $products->currentPage())
                                        <span class="pagination-number active">{{ $i }}</span>
                                    @else
                                        <a href="{{ $products->url($i) }}"
                                            class="pagination-number">{{ $i }}</a>
                                    @endif
                                @endfor

                                {{-- Next Page Link --}}
                                @if ($products->hasMorePages())
                                    <a href="{{ $products->nextPageUrl() }}" class="pagination-btn">Next</a>
                                @else
                                    <span class="pagination-btn disabled">Next</span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comparison Popup -->
    <div id="comparison-popup" class="comparison-popup hidden">
        <div class="comparison-content">
            <div class="comparison-header">
                <h2>Compare Vehicles</h2>
                <span class="close-popup" onclick="closeComparisonPopup()">&times;</span>
            </div>
            <div class="comparison-counter">
                <span id="compare-count">0</span>/3 vehicles selected
            </div>

            <!-- Available Cars Section -->
            <div class="available-cars-section">
                <h3 class="text-lg font-bold mb-4">Available Vehicles</h3>
                <div class="available-cars-grid">
                    @foreach ($allProducts as $product)
                        <div class="available-car-card" id="available-car-{{ $product->id }}">
                            <div class="car-image">
                                @if ($product->carModel && $product->carModel->image)
                                    <img src="{{ asset($product->carModel->image) }}"
                                        alt="{{ $product->carModel->name }}">
                                @else
                                    <div class="no-image">No Image</div>
                                @endif
                            </div>
                            <div class="car-details">
                                <h4>{{ $product->carModel->brand->name ?? 'Unknown Brand' }}
                                    {{ $product->carModel->name ?? 'Unknown Model' }}</h4>
                                <p class="price">{{ number_format($product->price, 0, ',', '.') }} VND</p>
                                <button type="button" class="select-for-compare-btn"
                                    onclick="addToCompare(
                                            {{ $product->id }},
                                            '{{ $product->carModel->brand->name ?? 'Unknown Brand' }}',
                                            '{{ $product->carModel->name ?? 'Unknown Model' }}',
                                            {{ $product->price }},
                                            '{{ $product->carModel && $product->carModel->image ? asset($product->carModel->image) : '' }}',
                                            '{{ $product->carModel->year ?? 'N/A' }}',
                                            '{{ $product->carModel->rangeOfCars->name ?? 'N/A' }}',
                                            '{{ $product->color ?? 'N/A' }}',
                                            '{{ $product->interior_color ?? 'N/A' }}',
                                            '{{ $product->carModel->description ?? 'No description available' }}'
                                        )">
                                    Select for Comparison
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="comparison-divider"></div>

            <!-- Selected Cars for Comparison -->
            <div class="selected-cars-section">
                <h3 class="text-lg font-bold mb-4">Selected for Comparison</h3>
                <div class="comparison-grid" id="comparison-grid">
                    <!-- Selected cars will be added here dynamically -->
                </div>
            </div>

            <div class="comparison-actions">
                <button onclick="clearComparison()" class="clear-btn">Clear All</button>
            </div>
        </div>
    </div>

    <style>
        .compare-btn {
            background-color: white;
            color: black;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: background-color 0.2s;
            border: gray solid 0.5px;
        }

        .compare-btn:hover {
            background-color: black;
            color: white;
        }

        .compare-btn.selected {
            background-color: black;
            color: white;
        }

        .comparison-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .comparison-content {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            width: 90%;
            max-width: 1200px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .comparison-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .comparison-header h2 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .close-popup {
            font-size: 1.5rem;
            cursor: pointer;
        }

        .comparison-counter {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #4a5568;
        }

        .comparison-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .car-comparison-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1rem;
        }

        .car-comparison-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .comparison-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .clear-btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            background-color: #eb5656;
            color: white;
        }

        .hidden {
            display: none;
        }

        .available-cars-section {
            margin-bottom: 2rem;
        }

        .available-cars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1rem;
            max-height: 400px;
            overflow-y: auto;
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }

        .available-car-card {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background-color: #f8fafc;
        }

        .car-image {
            width: 120px;
            height: 80px;
            overflow: hidden;
            border-radius: 4px;
        }

        .car-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e2e8f0;
            color: #64748b;
            font-size: 0.875rem;
        }

        .car-details {
            flex: 1;
        }

        .car-details h4 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .price {
            color: #e53e3e;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .select-for-compare-btn {
            background-color: white;
            color: black;
            padding: 0.5rem;
            border-radius: 0.375rem;
            width: 100%;
            font-size: 0.875rem;
            transition: background-color 0.2s;
            border: gray solid 0.5px;
        }

        .select-for-compare-btn:hover {
            background-color: black;
            color: white
        }

        .select-for-compare-btn.selected {
            background-color: black;
            color: white;
        }

        .comparison-divider {
            height: 1px;
            background-color: #e2e8f0;
            margin: 2rem 0;
        }

        .selected-cars-section {
            margin-bottom: 2rem;
        }

        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .comparison-table th,
        .comparison-table td {
            padding: 1rem;
            border: 1px solid #e2e8f0;
            text-align: left;
        }

        .comparison-table th {
            background-color: #f8fafc;
        }

        .car-header {
            text-align: center;
        }

        .car-header img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 0.5rem;
        }

        .car-header h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .car-header .price {
            color: #eb5656;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .remove-btn {
            background-color: #eb5656;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }

        .spec-group {
            background-color: #edf2f7;
            font-weight: 600;
        }

        .spec-group td {
            padding: 0.75rem 1rem;
        }

        .spec-name {
            font-weight: 500;
            width: 200px;
        }

        .spec-value {
            color: #4a5568;
        }

        .spec-value.different {
            background-color: #fef3c7;
        }

        /* Pagination Styles */
        .pagination-container {
            margin-top: 2rem;
        }

        .pagination-wrapper {
            display: inline-flex;
            padding: 0.5rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .pagination-btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            color: #4a5568;
            background-color: #f7fafc;
            transition: all 0.2s;
        }

        .pagination-btn:hover:not(.disabled) {
            background-color: #e53e3e;
            color: white;
        }

        .pagination-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination-number {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            color: #4a5568;
            transition: all 0.2s;
        }

        .pagination-number:hover:not(.active) {
            background-color: #f7fafc;
        }

        .pagination-number.active {
            background-color: #e53e3e;
            color: white;
        }
    </style>

    <script>
        // Comparison popup functionality
        let selectedCars = [];
        const MAX_CARS = 3;

        function openComparisonPopup() {
            document.getElementById('comparison-popup').classList.remove('hidden');
        }

        function addToCompare(id, brand, model, price, image, year, range, color, interiorColor, description) {
            const btn = document.querySelector(`#available-car-${id} .select-for-compare-btn`);

            if (btn.classList.contains('selected')) {
                selectedCars = selectedCars.filter(car => car.id !== id);
                btn.classList.remove('selected');
                btn.textContent = 'Select for Comparison';
            } else {
                if (selectedCars.length >= MAX_CARS) {
                    alert('You can compare up to 3 vehicles at a time');
                    return;
                }

                selectedCars.push({
                    id,
                    brand,
                    model,
                    price,
                    image,
                    year,
                    range,
                    color,
                    interiorColor,
                    description
                });
                btn.classList.add('selected');
                btn.textContent = 'Selected';
            }

            updateComparisonCounter();
            updateComparisonGrid();
        }

        function updateComparisonGrid() {
            const grid = document.getElementById('comparison-grid');
            grid.innerHTML = '';

            if (selectedCars.length === 0) {
                grid.innerHTML = '<p class="text-gray-500">No vehicles selected for comparison</p>';
                return;
            }

            // Create comparison table
            const table = document.createElement('table');
            table.className = 'comparison-table';

            // Headers
            const headerRow = document.createElement('tr');
            headerRow.innerHTML = '<th>Specifications</th>' +
                selectedCars.map(car => `
                    <th>
                        <div class="car-header">
                            <img src="${car.image}" alt="${car.brand} ${car.model}">
                            <h3>${car.brand} ${car.model}</h3>
                            <p class="price">${new Intl.NumberFormat('vi-VN').format(car.price)} VND</p>
                            <button onclick="removeFromComparison(${car.id})" class="remove-btn">Remove</button>
                        </div>
                    </th>
                `).join('');
            table.appendChild(headerRow);

            // Specifications Groups
            const specGroups = [{
                    title: 'Basic Information',
                    specs: [{
                            name: 'Brand',
                            key: 'brand'
                        },
                        {
                            name: 'Model',
                            key: 'model'
                        },
                        {
                            name: 'Year',
                            key: 'year'
                        },
                        {
                            name: 'Range',
                            key: 'range'
                        },
                        {
                            name: 'Price',
                            key: 'price',
                            format: (val) => `${new Intl.NumberFormat('vi-VN').format(val)} VND`
                        }
                    ]
                },
                {
                    title: 'Colors',
                    specs: [{
                            name: 'Exterior Color',
                            key: 'color'
                        },
                        {
                            name: 'Interior Color',
                            key: 'interiorColor'
                        }
                    ]
                },
                {
                    title: 'Description',
                    specs: [{
                        name: 'Vehicle Description',
                        key: 'description'
                    }]
                }
            ];

            // Add specification rows
            specGroups.forEach(group => {
                // Group header
                const groupRow = document.createElement('tr');
                groupRow.className = 'spec-group';
                groupRow.innerHTML = `<td colspan="${selectedCars.length + 1}">${group.title}</td>`;
                table.appendChild(groupRow);

                // Spec rows
                group.specs.forEach(spec => {
                    const row = document.createElement('tr');
                    row.innerHTML = `<td class="spec-name">${spec.name}</td>` +
                        selectedCars.map(car => {
                            let value = car[spec.key] || 'N/A';
                            if (spec.format && value !== 'N/A') {
                                value = spec.format(value);
                            }
                            return `<td class="spec-value">${value}</td>`;
                        }).join('');
                    table.appendChild(row);
                });
            });

            grid.appendChild(table);
        }

        function updateComparisonCounter() {
            document.getElementById('compare-count').textContent = selectedCars.length;
        }
        const styleSheet = document.createElement('style');
        styleSheet.textContent = `
            .comparison-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 1rem;
            }

            .comparison-table th,
            .comparison-table td {
                padding: 1rem;
                border: 1px solid #e2e8f0;
                text-align: left;
            }

            .comparison-table th {
                background-color: #f8fafc;
            }

            .car-header {
                text-align: center;
            }

            .car-header img {
                width: 200px;
                height: 150px;
                object-fit: cover;
                border-radius: 4px;
                margin-bottom: 0.5rem;
            }

            .car-header h3 {
                font-size: 1.125rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .car-header .price {
                color: #e53e3e;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .remove-btn {
                background-color: #eb5656;
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
                font-size: 0.875rem;
            }

            .spec-group {
                background-color: #edf2f7;
                font-weight: 600;
            }

            .spec-group td {
                padding: 0.75rem 1rem;
            }

            .spec-name {
                font-weight: 500;
                width: 200px;
            }

            .spec-value {
                color: #4a5568;
            }

            /* Highlight differences */
            .spec-value.different {
                background-color: #fef3c7;
            }
        `;
        document.head.appendChild(styleSheet);

        function removeFromComparison(id) {
            const btn = document.querySelector(`#available-car-${id} .select-for-compare-btn`);
            if (btn) {
                btn.classList.remove('selected');
                btn.textContent = 'Select for Comparison';
            }

            selectedCars = selectedCars.filter(car => car.id !== id);
            updateComparisonCounter();
            updateComparisonGrid();
        }

        function clearComparison() {
            selectedCars.forEach(car => {
                const btn = document.querySelector(`#available-car-${car.id} .select-for-compare-btn`);
                if (btn) {
                    btn.classList.remove('selected');
                    btn.textContent = 'Select for Comparison';
                }
            });

            selectedCars = [];
            updateComparisonCounter();
            updateComparisonGrid();
        }

        function closeComparisonPopup() {
            document.getElementById('comparison-popup').classList.add('hidden');
        }
    </script>


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
                            alert('Error loading range list');
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
                            alert('Error loading origin list');
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
