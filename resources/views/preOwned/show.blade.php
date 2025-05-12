@extends('layouts.app')

@section('title', $carModel->brand->name . ' ' . $carModel->name . ($carModel->year ? ' (' . $carModel->year . ')' : '') . ' - Details')

@section('content')
<div class="bg-gray-100 py-8 md:py-12">
    <div class="container mx-auto px-4">

        {{-- Breadcrumbs --}}
        <nav class="text-sm mb-8" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-red-700">Home</a>
                    <svg class="fill-current w-3 h-3 mx-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li class="flex items-center">
                    <a href="{{ route('brands.show', $carModel->brand->id) }}" class="text-gray-600 hover:text-red-700">{{ $carModel->brand->name }}</a>
                    <svg class="fill-current w-3 h-3 mx-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                @if($carModel->rangeOfCars)
                <li class="flex items-center">
                    <a href="{{ route('range_of_car.show', $carModel->rangeOfCars->id) }}" class="text-gray-600 hover:text-red-700">{{ $carModel->rangeOfCars->name }}</a>
                    <svg class="fill-current w-3 h-3 mx-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                @endif
                <li class="flex items-center">
                    <span class="text-gray-800 font-semibold">{{ $carModel->name }} {{ $carModel->year ? '('.$carModel->year.')' : '' }}</span>
                </li>
            </ol>
        </nav>

        <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
            <div class="md:flex">
                {{-- Image Gallery/Main Image --}}
                <div class="md:w-1/2 xl:w-3/5 p-4 md:p-6">
                    @if($carModel->image)
                        <img src="{{ asset($carModel->image) }}" alt="{{ $carModel->name }}" class="w-full h-auto object-contain rounded-lg shadow-md max-h-[500px]">
                        {{-- TODO: Add a gallery for more images if available --}}
                    @else
                        <div class="w-full h-[300px] md:h-[500px] bg-gray-200 flex items-center justify-center rounded-lg">
                            <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                </div>

                {{-- Car Details and Call to Action --}}
                <div class="md:w-1/2 xl:w-2/5 p-6 md:p-8">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-1">{{ $carModel->brand->name }} {{ $carModel->name }}</h1>
                    <p class="text-xl text-gray-700 mb-3">{{ $carModel->year ? 'Model Year: '.$carModel->year : '' }}</p>

                    @if($carModel->rangeOfCars)
                        <span class="inline-block bg-gray-200 text-gray-700 text-xs font-semibold px-2.5 py-0.5 rounded-full mb-4">
                            {{ $carModel->rangeOfCars->name }}
                        </span>
                    @endif

                    {{-- Displaying a starting price based on the first inventory item (sorted by price in controller) --}}
                    @if($carModel->inventories->isNotEmpty())
                        <p class="text-3xl font-bold text-red-600 mb-6">
                            Price from: {{ number_format($carModel->inventories->first()->price, 0, ',', '.') }} VND
                        </p>
                    @else
                        <p class="text-xl text-gray-500 mb-6">Price currently unavailable</p>
                    @endif

                    @if($carModel->description)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Overview</h3>
                            <p class="text-gray-600 leading-relaxed text-sm">
                                {{ Str::limit($carModel->description, 200) }} {{-- Show a snippet, full description below if needed --}}
                            </p>
                        </div>
                    @endif

                    {{-- Call to Action: Test Drive
                    <a href="{{ route('testdrive.form', ['car_model_id' => $carModel->id]) }}"
                       class="block w-full text-center bg-red-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-700 transition-colors duration-300 text-lg shadow-md hover:shadow-lg">
                        Request a Test Drive
                    </a> --}}

                    {{-- Key Features --}}
                    @if($carModel->inventories->isNotEmpty() && $carModel->inventories->first()->features)
                        @php $features = json_decode($carModel->inventories->first()->features); @endphp
                        @if(is_array($features) && count($features) > 0)
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Key Features:</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-1 text-sm">
                                @foreach(array_slice($features, 0, 5) as $feature) {{-- Display first 5 features --}}
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    @endif
                </div>
            </div>

            {{-- Detailed Description & Specifications Section (Tabs could be used here) --}}
            <div class="px-6 md:px-8 py-6 border-t border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">More Details</h2>
                {{-- You can use tabs here for Description, Specifications (Inventories), etc. --}}

                {{-- Full Description --}}
                @if($carModel->description)
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Full Description</h3>
                    <div class="text-gray-600 leading-relaxed"> 
                        {!! nl2br(e($carModel->description)) !!}
                    </div>
                </div>
                @endif

                {{-- Available Inventory (Colors, Prices, etc.) --}}
                @if($carModel->inventories->count() > 0)
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3">Available Options & Pricing</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Interior</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Features</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($carModel->inventories as $inventory)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $inventory->color ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $inventory->interior_color ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">
                                        @if($inventory->features)
                                            @php $featuresList = json_decode($inventory->features); @endphp
                                            @if(is_array($featuresList) && count($featuresList) > 0)
                                                {{ Str::limit(implode(', ', $featuresList), 50) }}
                                            @else
                                                -
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-600">{{ number_format($inventory->price, 0, ',', '.') }} VND</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $inventory->status === 'sale' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($inventory->status) }}
                                        </span>
                                         ({{ $inventory->quantity }} in stock)
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
