
<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-lg font-bold">All Car:
        <span class="text-indigo-600">3</span>
        {{-- Projects: <span class="text-indigo-600">884</span> --}}
      </h2>
        <a href="" class="text-white">
            <button class="bg-[#ff3131] hover:bg-[#B20710] text-white px-4 py-2 rounded-md text-sm font-semibold">
                + Add new Car
            </button>
        </a>
    </div>

    <table class="w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3"><input type="checkbox" /></th>
          <th class="p-3">ID</th>
          <th class="p-3">Brand</th>
          <th class="p-3">Range</th>
          <th class="p-3">Name</th>
          <th class="p-3">Year</th>
          <th class="p-3">Description</th>
          <th class="p-3">Image</th>
          <th class="p-3">Last update</th>
          <th class="p-3 text-center">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($carModels as $carModel)
        <tr>
            <td class="p-3"><input type="checkbox" /></td>
            <td class="p-3">
                <span>{{ $carModel->id }}</span>
            </td>
            <td class="p-3">
                <span>{{ $carModel->brand->name }}</span>
            </td>
            <td class="p-3">
                <span>{{ $carModel->rangeOfCars->name }}</span>
            </td>
            <td class="p-3">
                <span>{{ $carModel->name }}</span>
            </td>
            <td class="p-3">
                <span>{{ $carModel->year }}</span>
            </td>
            <td class="p-3">
                <span>{{ $carModel->description }}</span>
            </td>
            <td class="p-3">
                <img src="{{ asset('' . $carModel->image) }}" alt="{{ $carModel->name }}" class="w-30 h-12 object-contain mx-auto">
            </td>
            <td class="p-3">
                <span>{{ $carModel->created_at->format('d M Y') }}</span>
            </td>
            <td>
                <a href="/car_models/{{ $carModel->id }}/edit">Edit</a>
                <form action="/car_models/{{ $carModel->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4">
      <div class="text-sm text-gray-500">Showing 1-10 of 100</div>
      <div class="space-x-1">
        <button class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">&laquo;</button>
        <button class="px-2 py-1 bg-blue-600 text-white rounded">1</button>
        <button class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">2</button>
        <button class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">3</button>
        <button class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">&raquo;</button>
      </div>
    </div>
  </div>

