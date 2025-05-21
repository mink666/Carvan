<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Edit Schedule</h2>

    <form method="POST" action="{{ route('schedules.update', $schedule->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="scheduled_date" class="block text-sm font-medium text-gray-700">Scheduled Date</label>
            <input type="datetime-local" name="scheduled_date" id="scheduled_date"
                value="{{ old('scheduled_date', $schedule->scheduled_date) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" value="{{ old('location', $schedule->location) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                Update Schedule
            </button>

            <a href="/Admin/TestDriveScheduleMgr?state=list"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">
                Cancel
            </a>
        </div>
    </form>
</div>
