<div x-data="{ open: false }" class="relative mb-4 flex items-center gap-2">
    <div class="p-6 bg-white rounded-lg shadow-md w-full mx-auto">
        <h2 class="text-lg font-bold mb-4">Test Drive Schedules</h2>

        <table class="w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Request ID</th>
                    <th class="p-3">Schedule Date</th>
                    <th class="p-3">Location</th>
                    <th class="p-3">Schedule By</th>
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
                        <td class="p-3">{{ $schedule->user->name ?? 'N/A' }}</td>
                        <td class="p-3 text-center relative flex items-center justify-center">
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <button @click="open = !open" class="text-gray-600 hover:text-black focus:outline-none">
                                    <i class="fas fa-ellipsis"></i>
                                </button>

                                <!-- Dropdown -->
                                <div x-show="open" @click.away="open = false" x-transition
                                    class="origin-top-right absolute right-0 mt-2 w-28 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                                    <div class="py-1 text-sm text-gray-700">
                                        @if ($schedule->testDriveRequest && $schedule->testDriveRequest->status !== 'cancelled')
                                            <a href="{{ route('Admin.TestDriveScheduleMgr.edit', $schedule->id) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 text-gray-800">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                        @else
                                            <span class="block px-4 py-2 text-gray-400 cursor-not-allowed">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </span>
                                        @endif

                                        {{-- @admin
                                        <a href="{{ route('Admin.BrandMgr.edit', $brand->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                    @endadmin --}}

                                        <form method="POST" action="{{ route('schedules.cancel', $schedule->id) }}"
                                            onsubmit="return confirm('Are you sure you want to cancel this schedule?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100 hover:text-red-800">
                                                <i class="fa fa-times-circle"></i> Cancel
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        {{-- <td class="p-3 flex gap-2">
                        <a href="{{ route('Admin.TestDriveScheduleMgr.edit', $schedule->id) }}"
                            class="text-blue-600 hover:underline">Edit</a>

                        <form method="POST" action="{{ route('schedules.cancel', $schedule->id) }}"
                            onsubmit="return confirm('Are you sure you want to cancel this schedule?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Cancel</button>
                        </form>
                    </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
