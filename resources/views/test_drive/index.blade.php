@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif
        <!-- Section: Car Selection and Image -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- Left Column: Car Selection Form -->
            <div>
                <form method="POST" action="{{ route('test_drive.store') }}" class="space-y-6">
                    @csrf

                    <!-- Car Model Selection -->
                    <div>
                        <label for="car_model_id" class="block text-sm font-medium text-gray-700">Select Car Model</label>
                        <select name="car_model_id" id="car_model_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" onchange="updateCarImage()"
                            required>
                            @foreach ($carModels as $model)
                                <option value="{{ $model->id }}" data-image="{{ asset($model->image) }}"
                                    {{ $loop->first ? 'selected' : '' }}>
                                    {{ $model->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Preferred Date & Time -->
                    <div>
                        <label for="request_date" class="block text-sm font-medium text-gray-700">Preferred Date &
                            Time</label>
                        <input type="datetime-local" name="request_date" id="request_date"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('request_date') }}" required>

                        @error('request_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Note -->
                    <div>
                        <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                        <textarea name="note" id="note" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>

                    <div class="mt-20">
                        <h2 class="text-lg font-semibold text-gray-800 mt-20">Driver's Details</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="first_name" id="first_name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="last_name" id="last_name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            <!-- Email Address -->
                            <div>
                                <label for="email_address" class="block text-sm font-medium text-gray-700">Email
                                    Address</label>
                                <input type="email" name="email_address" id="email_address"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone
                                    Number</label>
                                <input type="tel" name="phone_number" id="phone_number"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                        </div>


                    </div>
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-64 bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

            <div>
                <!-- Right Column: Car Image -->
                <div class="flex items-start justify-center">
                    @php
                        $firstImage = $carModels->first()->image ?? '';
                    @endphp
                    <img id="carImage" src="{{ asset($firstImage) }}" alt="Selected Car"
                        class="w-full h-[350px] object-contain">
                </div>

                <!-- Right Column: Custom Image -->
                <div class="flex items-start justify-center">
                    <img src="{{ asset('images/test-drive.png') }}" alt="Driver's Detail Image"
                        class="w-full h-[350px] object-contain">
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

            document.querySelector('form').addEventListener('submit', function(e) {
                const dateInput = document.getElementById('request_date');
                const selectedDate = new Date(dateInput.value);
                const now = new Date();

                if (selectedDate < now) {
                    e.preventDefault();
                    alert("Please select a date and time in the future.");
                }
            });
        </script>
    @endsection
