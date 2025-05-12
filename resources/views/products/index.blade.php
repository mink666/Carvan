@extends('layouts.app')

@section('title', 'Products')
@push('styles')
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="products-page">
        <div class="products-container">
            <!-- Sidebar Filter -->
            <aside class="products-filter">
                <h3>Filter</h3>
                <form method="GET" action="{{ route('products.index') }}">
                    <div class="filter-group">
                        <label for="search">Search</label>
                        <input type="text" id="search" name="search" value="{{ request('search') }}"
                            placeholder="Search products...">
                    </div>
                    <div class="filter-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" value="{{ request('location') }}"
                            placeholder="All locations">
                    </div>
                    <div class="filter-group">
                        <label for="price_min">Price (Min)</label>
                        <input type="number" id="price_min" name="price_min" value="{{ request('price_min') }}"
                            placeholder="Min">
                    </div>
                    <div class="filter-group">
                        <label for="price_max">Price (Max)</label>
                        <input type="number" id="price_max" name="price_max" value="{{ request('price_max') }}"
                            placeholder="Max">
                    </div>
                    <div class="filter-group">
                        <label for="year">Year</label>
                        <input type="number" id="year" name="year" value="{{ request('year') }}"
                            placeholder="All years">
                    </div>
                    <div class="filter-group">
                        <label for="fuel">Fuel</label>
                        <input type="text" id="fuel" name="fuel" value="{{ request('fuel') }}"
                            placeholder="All fuels">
                    </div>
                    <div class="filter-group">
                        <label for="transmission">Transmission</label>
                        <input type="text" id="transmission" name="transmission" value="{{ request('transmission') }}"
                            placeholder="All types">
                    </div>
                    <button type="submit">Apply Filter</button>
                </form>
            </aside>
            <!-- Product Listing -->
            <section class="products-listing">
                @forelse($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="No image">
                            @endif
                        </div>
                        <div class="product-content">
                            <div class="product-title">{{ $product->name }}</div>
                            <div class="product-meta">
                                @if (isset($product->brand))
                                    <span>{{ $product->brand }}</span>
                                @endif
                                @if (isset($product->year))
                                    <span>{{ $product->year }}</span>
                                @endif
                            </div>
                            <div class="product-price">${{ number_format($product->price, 2) }}</div>
                            @if (isset($product->location))
                                <div class="product-location">{{ $product->location }}</div>
                            @endif
                            <div class="product-desc">{{ Str::limit(strip_tags($product->description), 100) }}</div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="far fa-box"></i>
                        <p>No products found.</p>
                    </div>
                @endforelse
            </section>
        </div>
        <div class="pagination-container" style="margin-top: 2rem; text-align: center;">
            {{ $products->links() }}
        </div>
    </div>
@endsection
