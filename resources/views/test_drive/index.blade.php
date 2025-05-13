@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Section: Car Selection and Image -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <!-- Left Column: Car Selection Form -->
        <div>
            <form method="POST" action="{{ route('test_drive.store') }}" class="space-y-6">
                @csrf

                <!-- Car Model Selection -->
                <div>
                    <label for="car_model_id" class="block text-sm font-medium text-gray-700">Select Car Model</label>
                    <select name="car_model_id" id="car_model_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" onchange="updateCarImage()" required>
                        @foreach($carModels as $model)
                            <option value="{{ $model->id }}" data-image="{{ asset($model->image) }}" {{ $loop->first ? 'selected' : '' }}>
                                {{ $model->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Preferred Date & Time -->
                <div>
                    <label for="request_date" class="block text-sm font-medium text-gray-700">Preferred Date & Time</label>
                    <input type="datetime-local" name="request_date" id="request_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Note -->
                <div>
                    <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                    <textarea name="note" id="note" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
            </form>
        </div>

        <!-- Right Column: Car Image -->
        <div class="flex items-start justify-center">
            @php
                $firstImage = $carModels->first()->image ?? '';
            @endphp
            <img id="carImage" src="{{ asset($firstImage) }}" alt="Selected Car" class="w-full h-[350px] object-contain">
        </div>
    </div>

    <!-- Section: Driver's Details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Left Column: Driver's Details Form -->
        <form method="POST" action="{{ route('test_drive.store') }}" class="space-y-6">
            @csrf

            <h2 class="text-lg font-semibold text-gray-800">Driver's Details</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- First Name -->
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Last Name -->
                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Email Address -->
                <div>
                    <label for="emailaddress" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="emailaddress" id="emailaddress" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phonenumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" name="phonenumber" id="phonenumber" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-64 bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700">
                    Submit
                </button>
            </div>
        </form>

        <!-- Right Column: Custom Image -->
        <div class="flex items-start justify-center">
            <img src="{{ asset('images/test-drive.png') }}" alt="Driver's Detail Image" class="w-full h-[350px] object-contain">
        </div>
    </div>
</div>

<script>
    function updateCarImage() {
        const select = document.getElementById('car_model_id');
        const selectedOption = select.options[select.selectedIndex];
        const imageUrl = selectedOption.getAttribute('data-image');
        const imageElement = document.getElementById('carImage');
        imageElement.src = imageUrl;
    }
</script>
@endsection
