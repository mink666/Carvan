
<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-lg font-bold">All PreOwnd Car:
        <span class="text-indigo-600">{{$PreOwnedCars->count()}}</span>
        {{-- Projects: <span class="text-indigo-600">884</span> --}}
      </h2>
        <a href="/Admin/PreOwnedMgr?state=create" class="text-white">
            <button class="bg-[#ff3131] hover:bg-[#B20710] text-white px-4 py-2 rounded-md text-sm font-semibold">
                + Add PreOwned Car
            </button>
        </a>
    </div>

    <table class="w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3"><input type="checkbox" /></th>
          <th class="p-3">ID</th>
          <th class="p-3">Name Preowned Car</th>
          <th class="p-3">Mileage</th>
          <th class="p-3">Color</th>
          <th class="p-3">Condition</th>
          <th class="p-3">Story</th>
          <th class="p-3">Price</th>
          <th class="p-3">Image</th>
          <th class="p-3">Last update</th>
          <th class="p-3 text-center">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($PreOwnedCars as $PreOwnedCar)
        <tr>
            <td class="p-3"><input type="checkbox" /></td>
            <td class="p-3">
                <span>{{ $PreOwnedCar->id }}</span>
            </td>
            <td class="p-3">
                <span>{{ $PreOwnedCar->name }}</span>
            </td>
            <td class="p-3">
                <span>{{ $PreOwnedCar->mileage }}</span>
            </td>
            <td class="p-3">
                <span>{{ $PreOwnedCar->color }}</span>
            </td>
            <td class="p-3">
                <span>{{ $PreOwnedCar->condition }}</span>
            </td>
            <td class="p-3">
                <span>{{ $PreOwnedCar->story }}</span>
            </td>
            <td class="p-3">
                <span>{{ $PreOwnedCar->price }}</span>
            </td>
            <td class="p-3">
                <img src="{{ file_exists(public_path('storage/' . $PreOwnedCar->image)) ? asset('storage/' . $PreOwnedCar->image) : asset('' . $PreOwnedCar->image) }}"
                    alt="{{ $PreOwnedCar->name }}"
                    class="w-30 h-12 object-contain mx-auto"/>
            </td>

            <td class="p-3">
                <span>{{ $PreOwnedCar->created_at->format('d M Y') }}</span>
            </td>

            <td class="p-3 text-center relative">
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                      <button @click="open = !open" class="text-gray-600 hover:text-black focus:outline-none">
                        <i class="fas fa-ellipsis"></i>
                      </button>

                      <!-- Dropdown -->
                      <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition
                        class="origin-top-right absolute right-0 mt-2 w-28 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10"
                      >
                        <div class="py-1 text-sm text-gray-700">
                            <a href=""
                             class="block px-4 py-2 hover:bg-gray-100">
                             <i class="fas fa-search"></i>
                             Detail
                            </a>
                          <a href="{{ route('Admin.PreOwnedMgr.edit', $PreOwnedCar->id) }}"
                             class="block px-4 py-2 hover:bg-gray-100">
                             <i class="fa fa-edit"></i>
                             Edit
                            </a>

                          {{-- <form action="/car_models/{{ $carModel->id }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">
                                    <i class="fa fa-trash"></i>
                              Delete
                            </button>
                          </form> --}}
                        </div>
                      </div>
                    </div>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4" id="pagination-wrapper">
    <div id="pagination-info" class="text-sm text-gray-500">Showing 1–10</div>
    <div id="pagination-buttons" class="space-x-1"></div>
    </div>




  </div>
<script>
$(document).ready(function () {
    const rowsPerPage = 10;
    const $rows = $('tbody tr');
    const rowsCount = $rows.length;
    const pageCount = Math.ceil(rowsCount / rowsPerPage);
    let currentPage = 1;

    function showPage(page) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        $rows.hide().slice(start, end).show();

        // Cập nhật text: Showing x–y of z
        const from = start + 1;
        const to = Math.min(end, rowsCount);
        $('#pagination-info').text(`Showing ${from}–${to} of ${rowsCount}`);
    }

    function renderPagination() {
        $('#pagination-buttons').empty();

        // Nút Prev
        const $prev = $('<button class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">&laquo;</button>');
        if (currentPage === 1) $prev.prop('disabled', true).addClass('opacity-50');
        $prev.click(() => {
            if (currentPage > 1) {
                currentPage--;
                update();
            }
        });
        $('#pagination-buttons').append($prev);

        // Các nút trang
        for (let i = 1; i <= pageCount; i++) {
            const $btn = $('<button class="px-2 py-1 rounded"></button>');
            $btn.text(i);

            if (i === currentPage) {
                $btn.addClass('bg-blue-600 text-white');
            } else {
                $btn.addClass('bg-gray-200 hover:bg-gray-300');
            }

            $btn.click(() => {
                currentPage = i;
                update();
            });

            $('#pagination-buttons').append($btn);
        }

        // Nút Next
        const $next = $('<button class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">&raquo;</button>');
        if (currentPage === pageCount) $next.prop('disabled', true).addClass('opacity-50');
        $next.click(() => {
            if (currentPage < pageCount) {
                currentPage++;
                update();
            }
        });
        $('#pagination-buttons').append($next);
    }

    function update() {
        showPage(currentPage);
        renderPagination();
    }

    update();
});
</script>


