@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20 py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Book a Test Drive</h2>

        <form action="{{ route('test_drive.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column: Form -->
                <div>
                    <!-- Select Car Model -->
                    <div class="mb-4">
                        <label for="car_model" class="block font-medium mb-2">Select a Car Model</label>
                        <select name="car_model_id" id="car_model" class="border rounded p-2 w-full">
                            @foreach ($carModels as $model)
                                <option value="{{ $model->id }}" data-image="{{ asset($model->image) }}"
                                    {{ $loop->first ? 'selected' : '' }}>
                                    {{ $model->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Preferred Date -->
                    <div class="mb-4">
                        <label for="request_date" class="block font-medium mb-2">Preferred Date & Time</label>
                        <input type="datetime-local" name="request_date" id="request_date"
                            class="border rounded p-2 w-full">
                    </div>

                    <!-- Note -->
                    <div class="mb-4">
                        <label for="note" class="block font-medium mb-2">Note</label>
                        <textarea name="note" id="note" rows="4" class="border rounded p-2 w-full"
                            placeholder="Any special requests..."></textarea>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Submit Request
                    </button>
                </div>

                <!-- Right Column: Image -->
                <div class="w-full h-[400px] flex items-center justify-center border rounded shadow overflow-hidden">
                    @php
                        $firstImage = $carModels->first()->image ?? '';
                    @endphp
                    <img id="carImage" src="{{ asset($firstImage) }}" alt="Selected Car"
                        class="w-full h-full object-cover transition-all duration-300 ease-in-out">
                </div>

            </div>
        </form>
    </div>

    <script>
        document.getElementById('car_model').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const imageUrl = selectedOption.getAttribute('data-image');
            document.getElementById('carImage').src = imageUrl;
        });
    </script>
@endsection
