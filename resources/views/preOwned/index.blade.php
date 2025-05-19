@extends('layouts.app')

@section('content')
    <div class="products-page">
        <!-- Banner Section -->
        <section class="hero-banner-section">
            <div class="swiper hero-banner-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/banner-preowned.jpg') }}" class="ne-slide-image"
                                alt="Pre-Owned Vehicles">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Pre-Owned Collection</h2>
                                <p>Quality assured pre-owned luxury vehicles</p>
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
            <form action="{{ route('preowned.index') }}" method="GET" class="search-form">
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
                        <a href="?search=Toyota" class="suggestion-tag">Toyota</a>
                        <a href="?search=Honda" class="suggestion-tag">Honda</a>
                        <a href="?search=Low+Mileage" class="suggestion-tag">Low Mileage</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="products-container">
            <!-- Filter Section -->
            <div class="products-filter">
                <h3>Filters</h3>
                <form action="{{ route('preowned.index') }}" method="GET">
                    <div class="filter-group">
                        <label>Brand</label>
                        <select name="brand" id="brandSelectPreowned">
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
                        <select name="range" id="rangeSelectPreowned">
                            <option value="">All Models</option>
                            @foreach ($ranges as $range)
                                <option value="{{ $range->id }}" {{ request('range') == $range->id ? 'selected' : '' }}>
                                    {{ $range->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Price Range</label>
                        <select name="price_range">
                            <option value="">All Prices</option>
                            <option value="under_500" {{ request('price_range') == 'under_500' ? 'selected' : '' }}>
                                Under 500.000.000 VND</option>
                            <option value="500_1000" {{ request('price_range') == '500_1000' ? 'selected' : '' }}>
                                500.000.000 VND - 1.000.000.000 VND</option>
                            <option value="1000_2000" {{ request('price_range') == '1000_2000' ? 'selected' : '' }}>
                                1.000.000.000 VND - 2.000.000.000 VND</option>
                            <option value="above_2000" {{ request('price_range') == 'above_2000' ? 'selected' : '' }}>
                                Above 2.000.000.000 VND</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Mileage</label>
                        <select name="mileage">
                            <option value="">All Mileage</option>
                            <option value="under_10000" {{ request('mileage') == 'under_10000' ? 'selected' : '' }}>
                                Under 10,000 km</option>
                            <option value="10000_30000" {{ request('mileage') == '10000_30000' ? 'selected' : '' }}>
                                10,000 - 30,000 km</option>
                            <option value="30000_50000" {{ request('mileage') == '30000_50000' ? 'selected' : '' }}>
                                30,000 - 50,000 km</option>
                            <option value="above_50000" {{ request('mileage') == 'above_50000' ? 'selected' : '' }}>
                                Above 50,000 km</option>
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
                @forelse($preownedCars as $preowned)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="relative">
                            <a href="{{ route('preowned.show', $preowned->id) }}">
                                @if ($preowned->image)
                                    <img src="{{ asset($preowned->image) }}"
                                        alt="{{ $preowned->inventory->carModel->name ?? 'Pre-Owned Vehicle' }}"
                                        class="w-full h-56 object-cover">
                                @else
                                    <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <span
                                    class="absolute top-3 left-3 bg-red-600 text-white text-xs font-bold px-2.5 py-1 rounded">PRE-OWNED</span>
                            </a>
                        </div>
                        <div class="p-5">
                            <a href="{{ route('preowned.show', $preowned->id) }}">
                                <h3 class="text-xl font-bold text-gray-900 mb-1">
                                    {{ $preowned->inventory->carModel->brand->name ?? 'Unknown Brand' }}
                                    {{ $preowned->inventory->carModel->name ?? 'Unknown Model' }}
                                    ({{ $preowned->inventory->carModel->year ?? 'N/A' }})
                                </h3>
                            </a>

                            <div class="description">
                                <p><strong>Mileage:</strong> {{ number_format($preowned->mileage, 0, ',', '.') }} km</p>
                                <p><strong>Condition:</strong> {{ $preowned->condition ?? 'N/A' }}</p>
                                <p><strong>Color:</strong> {{ $preowned->color ?? 'N/A' }}</p>
                            </div>

                            <div class="mt-auto">
                                <p class="text-2xl font-bold text-red-600 mb-4">
                                    {{ number_format($preowned->price, 0, ',', '.') }} VND
                                </p>

                                <div class="flex gap-2">
                                    <a href="{{ route('preowned.show', $preowned->id) }}" class="view-details-btn">
                                        View Details
                                    </a>
                                    <button type="button" class="compare-btn" onclick="openComparisonPopup()"
                                        id="compare-btn-{{ $preowned->id }}">
                                        Compare
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-car-alt"></i>
                        <p>No pre-owned vehicles available at the moment.</p>
                        <p>Please try different filters or check back later.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            {{ $preownedCars->links() }}
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
                    @foreach ($preownedCars as $car)
                        <div class="available-car-card" id="available-car-{{ $car->id }}">
                            <div class="car-image">
                                @if ($car->image)
                                    <img src="{{ asset($car->image) }}" alt="{{ $car->inventory->carModel->name }}">
                                @else
                                    <div class="no-image">No Image</div>
                                @endif
                            </div>
                            <div class="car-details">
                                <h4>{{ $car->inventory->carModel->brand->name }} {{ $car->inventory->carModel->name }}
                                </h4>
                                <p class="price">{{ number_format($car->price, 0, ',', '.') }} VND</p>
                                <button type="button" class="select-for-compare-btn"
                                    onclick="addToCompare(
                                            {{ $car->id }},
                                            '{{ $car->inventory->carModel->brand->name }}',
                                            '{{ $car->inventory->carModel->name }}',
                                            '{{ $car->price }}',
                                            '{{ $car->image }}',
                                            '{{ $car->inventory->carModel->year }}',
                                            '{{ $car->mileage }}',
                                            '{{ $car->color }}',
                                            '{{ $car->interior_color }}',
                                            '{{ $car->condition }}',
                                            '{{ $car->inventory->carModel->description }}',
                                            {{ $car->features }}
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
            background-color: #2c5282;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .compare-btn:hover {
            background-color: #2a4365;
        }

        .compare-btn.selected {
            background-color: #48bb78;
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
            background-color: #e53e3e;
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
            background-color: #2c5282;
            color: white;
            padding: 0.5rem;
            border-radius: 0.375rem;
            width: 100%;
            font-size: 0.875rem;
            transition: background-color 0.2s;
        }

        .select-for-compare-btn:hover {
            background-color: #2a4365;
        }

        .select-for-compare-btn.selected {
            background-color: #48bb78;
        }

        .comparison-divider {
            height: 1px;
            background-color: #e2e8f0;
            margin: 2rem 0;
        }

        .selected-cars-section {
            margin-bottom: 2rem;
        }
    </style>

    <script>
        let selectedCars = [];
        const MAX_CARS = 3;

        function openComparisonPopup() {
            document.getElementById('comparison-popup').classList.remove('hidden');
        }

        function addToCompare(id, brand, model, price, image, year, mileage, color, interiorColor, condition, description,
            features) {
            const btn = document.querySelector(`#available-car-${id} .select-for-compare-btn`);

            if (btn.classList.contains('selected')) {
                // Remove from comparison
                selectedCars = selectedCars.filter(car => car.id !== id);
                btn.classList.remove('selected');
                btn.textContent = 'Select for Comparison';
            } else {
                // Add to comparison
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
                    mileage,
                    color,
                    interiorColor,
                    condition,
                    description,
                    features: typeof features === 'string' ? JSON.parse(features) : features
                });
                btn.classList.add('selected');
                btn.textContent = 'Selected';
            }

            updateComparisonCounter();
            updateComparisonGrid();
        }

        function updateComparisonCounter() {
            document.getElementById('compare-count').textContent = selectedCars.length;
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
                            name: 'Mileage',
                            key: 'mileage',
                            format: (val) => `${val} km`
                        },
                        {
                            name: 'Condition',
                            key: 'condition'
                        },
                        {
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
                },
                {
                    title: 'Features',
                    specs: [{
                        name: 'Vehicle Features',
                        key: 'features',
                        type: 'list'
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
                            if (spec.type === 'list' && Array.isArray(value)) {
                                value = value.join(', ') || 'N/A';
                            }
                            return `<td class="spec-value">${value}</td>`;
                        }).join('');
                    table.appendChild(row);
                });
            });

            grid.appendChild(table);
        }

        // Add styles for comparison table
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
                background-color: #e53e3e;
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

    <script>
        // Script for preowned filter
        document.addEventListener('DOMContentLoaded', function() {
            const brandSelect = document.getElementById('brandSelectPreowned');
            const rangeSelect = document.getElementById('rangeSelectPreowned');

            if (brandSelect) {
                brandSelect.addEventListener('change', async function() {
                    const selectedBrand = this.value;

                    if (selectedBrand) {
                        // Fetch ranges for selected brand
                        const rangeResponse = await fetch(
                            `/get-ranges-by-brand-preowned/${selectedBrand}`);
                        const rangeData = await rangeResponse.json();

                        // Update range options
                        rangeSelect.innerHTML = '<option value="">All Models</option>';
                        rangeData.forEach(range => {
                            const option = document.createElement('option');
                            option.value = range.id;
                            option.textContent = range.name;
                            rangeSelect.appendChild(option);
                        });
                    }
                });

                // Trigger change event if brand is pre-selected
                if (brandSelect.value) {
                    brandSelect.dispatchEvent(new Event('change'));
                }
            }
        });
    </script>
@endsection
