<div x-data="{ open: false }" class="relative mb-4 flex items-center gap-2">
<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-lg font-bold">All Ranges:
        <span class="text-indigo-600"></span>
        <span class="text-blue-500">{{ $ranges->count() }}</span>
      </h2>
      <div class="flex items-center gap-2">
            <div id="no-results-row" class="hidden">
                <div colspan="6" class="text-center py-4 text-gray-500">
                    <i class="fas fa-exclamation-circle text-red-500 mr-2"></i> No results found.
                </div>
            </div>
            <button @click="open = !open" class="text-gray-600 hover:text-black focus:outline-none">
            <i class="fas fa-search text-xl"></i>
            </button>

            <!-- Search Input -->
            <form method="GET" action="{{ route('Admin.RangesMgr') }}"
                x-show="open"
                @click.away="open = false"
                x-transition
                class="flex items-center"
            >
                <input type="text"
                    id="search-input"
                    name="keyword"
                    placeholder="Search..."
                    value="{{ request('keyword') }}"
                    class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring w-64"
                    @keydown.enter="open = false"
                />
            </form>
            <a href="/Admin/RangesMgr?state=create" class="text-white">
                <button class="bg-[#ff3131] hover:bg-[#B20710] text-white px-4 py-2 rounded-md text-sm font-semibold">
                    + Add Ranges
                </button>
            </a>
        </div>
    </div>

    <table class="w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3"><input type="checkbox" /></th>
          <th class="p-3">ID</th>
          <th class="p-3">Name</th>
          <th class="p-3">Description</th>
          <th class="p-3">Last create</th>
          <th class="p-3 text-center">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ranges as $range)
        <tr>
            <td class="p-3"><input type="checkbox" /></td>
            <td class="p-3">
                <span>{{ $range->id }}</span>
            </td>
            <td class="p-3">
                <span class="range-name">{{ $range->name }}</span>
            </td>
            <td class="p-3">
                <span>{{ $range->description }}</span>
            </td>
            <td class="p-3">
                <span>{{ $range->updated_at->format('d M Y') }}</span>
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
                            @admin
                          <a href="{{ route('Admin.RangesMgr.edit', $range->id) }}"
                             class="block px-4 py-2 hover:bg-gray-100">
                             <i class="fa fa-edit"></i>
                             Edit
                            </a>
                            @endadmin
                          {{-- <form action="/car_models/{{ $range->id }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
    let filteredRows;
    $('#search-input').on('input', function () {
        const keyword = $(this).val().toLowerCase();
        let $filteredRows = $('tbody tr').not('#no-results-row').filter(function () {
            const nameText = $(this).find('.range-name').text().toLowerCase();
            return nameText.includes(keyword);
        });

        $('tbody tr').not('#no-results-row').hide(); // Ẩn tất cả
        $filteredRows.show(); // Hiện dòng khớp

        if ($filteredRows.length === 0) {
            $('#no-results-row').removeClass('hidden');
            $('#pagination-wrapper').addClass('hidden');
            $('#pagination-info').text(`No results found`);
        } else {
            $('#no-results-row').addClass('hidden');
            $('#pagination-wrapper').removeClass('hidden');
            $('#pagination-info').text(`Found ${$filteredRows.length} result(s)`);
        }

        // Cập nhật lại danh sách cho phân trang
        filteredRows = $filteredRows; // Lưu tạm vào biến toàn cục
        currentPage = 1;
        update(); // Cập nhật phân trang theo dữ liệu lọc
    });


    const rowsPerPage = 10;
    const $rows = $('tbody tr');
    const rowsCount = $rows.length;
    const pageCount = Math.ceil(rowsCount / rowsPerPage);
    let currentPage = 1;

    function showPage(page) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        // Nếu có filteredRows (sau khi lọc), dùng nó
        const rowsToPaginate = filteredRows && filteredRows.length ? filteredRows : $rows.not('#no-results-row');

        rowsToPaginate.hide().slice(start, end).show();

        const from = start + 1;
        const to = Math.min(end, rowsToPaginate.length);
        $('#pagination-info').text(`Showing ${from}–${to} of ${rowsToPaginate.length}`);
    }


    function renderPagination() {
        $('#pagination-buttons').empty();


        const $prev = $('<button class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">&laquo;</button>');
        if (currentPage === 1) $prev.prop('disabled', true).addClass('opacity-50');
        $prev.click(() => {
            if (currentPage > 1) {
                currentPage--;
                update();
            }
        });
        $('#pagination-buttons').append($prev);


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



