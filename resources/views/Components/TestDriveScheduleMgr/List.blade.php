<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-lg font-bold mb-4">Test Drive Schedules</h2>

    <table class="w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Request ID</th>
                <th class="p-3">Date</th>
                <th class="p-3">Location</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td class="p-3">{{ $schedule->id }}</td>
                    <td class="p-3">{{ $schedule->test_drive_request_id }}</td>
                    <td class="p-3">{{ $schedule->scheduled_date }}</td>
                    <td class="p-3">{{ $schedule->location }}</td>
                    <td class="p-3 capitalize">{{ $schedule->status }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="text-blue-600 hover:underline">Edit</a>

                        <form method="POST" action="{{ route('schedules.cancel', $schedule->id) }}"
                            onsubmit="return confirm('Are you sure you want to cancel this schedule?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Cancel</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
