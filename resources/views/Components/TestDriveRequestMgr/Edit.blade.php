<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mt-8">
    <h2 class="text-xl font-semibold mb-6">
        Schedule Test Drive for:
        <span class="text-indigo-600">{{ $testDriveRequest->first_name }} {{ $testDriveRequest->last_name }}</span>
    </h2>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-4 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedules.store') }}" method="POST" class="space-y-6">
        @csrf

        <input type="hidden" name="test_drive_request_id" value="{{ $testDriveRequest->id }}">

        <div>
            <label for="scheduled_date" class="block text-sm font-medium text-gray-700">Scheduled Date & Time</label>
            <input type="datetime-local" name="scheduled_date" id="scheduled_date"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Confirm Schedule
            </button>
        </div>
    </form>
</div>
