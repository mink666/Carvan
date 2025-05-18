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
                <th class="p-3">Date</th>
                <th class="p-3">Status</th>
                <th class="p-3">Note</th>
                <th class="p-3">Driver</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td class="p-3">{{ $request->id }}</td>
                    <td class="p-3">{{ $request->carModel->name ?? 'N/A' }}</td>
                    <td class="p-3">{{ $request->request_date }}</td>
                    <td class="p-3 capitalize">{{ $request->status }}</td>
                    <td class="p-3">{{ $request->note }}</td>
                    <td class="p-3">
                        {{ $request->first_name }} {{ $request->last_name }}<br>
                        {{ $request->email_address }}<br>
                        {{ $request->phone_number }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
