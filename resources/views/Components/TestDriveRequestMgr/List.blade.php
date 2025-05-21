<div class="p-6 bg-white rounded-lg shadow-md">

    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold">
            All Requests: <span class="text-indigo-600">{{ $requests->count() }}</span>
        </h2>
    </div>

    <table class="w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Car Model</th>
                <th class="p-3">Request Date</th>
                <th class="p-3">Driver Info</th>
                <th class="p-3">Note</th>
                <th class="p-3">Status</th>
                <th class="p-3">Schedule By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr class="border-b">
                    <td class="p-3">{{ $request->id }}</td>
                    <td class="p-3">{{ $request->carModel->name ?? 'N/A' }}</td>
                    <td class="p-3">{{ \Carbon\Carbon::parse($request->request_date)->format('M d Y H:i') }}</td>
                    <td class="p-3">
                        {{ $request->first_name }} {{ $request->last_name }}<br>
                        {{ $request->email_address }}<br>
                        {{ $request->phone_number }}
                    </td>
                    <td class="p-3">{{ $request->note ?? '—' }}</td>
                    <td class="p-3 capitalize">
                        @if ($request->status == 'pending')
                            <span
                                class="inline-block px-2 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">
                                Pending
                            </span>
                        @elseif ($request->status == 'cancelled')
                            <span
                                class="inline-block px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">
                                Cancelled
                            </span>
                        @else
                            <span
                                class="inline-block px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                Processed
                            </span>
                        @endif
                    </td>
                    <td class="p-3">
                        @if ($request->schedule)
                            <div>
                                {{ $request->schedule->user->name ?? 'N/A' }}
                            </div>
                        @else
                            <a href="{{ route('Admin.TestDriveRequestMgr.edit', $request->id) }}"
                                class="text-blue-600 hover:underline font-semibold">
                                + Assign Schedule
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
