@extends('layouts.app')

@section('title', $preownedCar->name . ' - Carvan')

@section('content')
    <div class="product-show">
        <div class="container mx-auto px-4">
            {{-- Breadcrumbs --}}
            <nav class="breadcrumb-nav" aria-label="Breadcrumb">
                <ol>
                    <li class="flex items-center">
                        <a href="{{ route('home') }}">Home</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <a href="{{ route('preowned.index') }}">Pre-Owned Vehicles</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                    </li>
                    <li>
                        <span class="font-semibold">{{ $preownedCar->name }}</span>
                    </li>
                </ol>
            </nav>

            <div class="product-detail-card">
                <div class="md:flex">
                    {{-- Image Gallery/Main Image --}}
                    <div class="md:w-1/2 xl:w-3/5 product-gallery">
                        @if ($preownedCar->image)
                            <img src="{{ asset($preownedCar->image) }}" alt="{{ $preownedCar->name }}">
                        @else
                            <div
                                class="w-full h-[300px] md:h-[500px] bg-gray-200 flex items-center justify-center rounded-lg">
                                <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Car Details and Call to Action --}}
                    <div class="md:w-1/2 xl:w-2/5 product-info">
                        <h1 class="product-title">{{ $preownedCar->name }}</h1>

                        <p class="product-price">
                            {{ number_format($preownedCar->price, 0, ',', '.') }} VND
                        </p>

                        @if ($preownedCar->story)
                            <div class="product-description">
                                <h3 class="text-lg font-semibold mb-2">Overview</h3>
                                <p>{{ $preownedCar->story }}</p>
                            </div>
                        @endif

                        {{-- Key Features --}}
                        @if ($preownedCar->features)
                            @php $features = json_decode($preownedCar->features); @endphp
                            @if (is_array($features) && count($features) > 0)
                                <div class="features-list">
                                    <h3>Key Features:</h3>
                                    <ul>
                                        @foreach (array_slice($features, 0, 5) as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endif

                        <a href="{{ route('test_drive.index') }}" class="test-drive-btn">
                            Request a Test Drive
                        </a>
                        <a href="{{ route('preowned.index') }}" class="black-btn">
                            Back to Pre-Owned Vehicles
                        </a>
                    </div>
                </div>

                {{-- Detailed Description & Specifications Section --}}
                <div class="p-6 md:p-8 border-t border-gray-200">
                    <h2 class="text-2xl font-semibold mb-6">More Details</h2>

                    @if ($preownedCar->story)
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold mb-4">Full Description</h3>
                            <div class="product-description">
                                {!! nl2br(e($preownedCar->story)) !!}
                            </div>
                        </div>
                    @endif

                    {{-- Vehicle Details --}}
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-4">Vehicle Details & Pricing</h3>
                        <div class="overflow-x-auto">
                            <table class="inventory-table">
                                <thead>
                                    <tr>
                                        <th>Color</th>
                                        <th>Interior</th>
                                        <th>Features</th>
                                        <th>Price</th>
                                        <th>Condition</th>
                                        <th>Mileage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $preownedCar->color ?? '-' }}</td>
                                        <td>{{ $preownedCar->interior_color ?? '-' }}</td>
                                        <td>
                                            @if ($preownedCar->features)
                                                @php $featuresList = json_decode($preownedCar->features); @endphp
                                                @if (is_array($featuresList) && count($featuresList) > 0)
                                                    {{ Str::limit(implode(', ', $featuresList), 50) }}
                                                @else
                                                    -
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="font-semibold text-red-600">
                                            {{ number_format($preownedCar->price, 0, ',', '.') }} VND
                                        </td>
                                        <td>
                                            <span
                                                class="status-badge {{ $preownedCar->condition === 'excellent' ? 'available' : 'pending' }}">
                                                {{ ucfirst($preownedCar->condition) }}
                                            </span>
                                        </td>
                                        <td>{{ number_format($preownedCar->mileage, 0, ',', '.') }} km</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Similar Vehicles --}}
                    @if ($similarVehicles->count() > 0)
                        <div class="similar-vehicles mt-8">
                            <h3 class="text-xl font-semibold mb-4">Similar Vehicles</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                @foreach ($similarVehicles as $vehicle)
                                    <div class="similar-vehicle-card">
                                        <img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->name }}"
                                            class="w-full h-40 object-cover">
                                        <div class="p-4">
                                            <h4 class="font-semibold">{{ $vehicle->name }}</h4>
                                            <p class="text-red-600 font-semibold">
                                                {{ number_format($vehicle->price, 0, ',', '.') }} VND</p>
                                            <a href="{{ route('preowned.show', $vehicle->id) }}"
                                                class="view-details-link">View Details</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
