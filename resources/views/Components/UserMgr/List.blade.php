
<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-lg font-bold">All User:
        <span class="text-indigo-600">3</span>
        {{-- Projects: <span class="text-indigo-600">884</span> --}}
      </h2>
        <a href="/Admin/UserMgr?state=create" class="text-white">
            <button class="bg-[#ff3131] hover:bg-[#B20710] text-white px-4 py-2 rounded-md text-sm font-semibold">
                + Add new user
            </button>
        </a>
    </div>

    <table class="w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3"><input type="checkbox" /></th>
          <th class="p-3">ID</th>
          <th class="p-3">Username</th>
          <th class="p-3">Email</th>
          <th class="p-3">name</th>
          <th class="p-3">role</th>
          <th class="p-3">Last update</th>
          <th class="p-3 text-center">Status</th>
        </tr>
      </thead>
      <tbody>
            @foreach($users as $user)
            <tr>
                <td class="p-3"><input type="checkbox" /></td>
                <td class="p-3">
                    <span>{{ $user->id }}</span>
                </td>
                <td class="p-3">
                    <span>{{ $user->username }}</span>
                </td>
                <td class="p-3">
                    <span>{{ $user->email }}</span>
                </td>
                <td class="p-3">
                    <span>{{ $user->name }}</span>
                </td>
                <td class="p-3">
                    <span>{{ $user->role }}</span>
                </td>
                <td class="p-3">
                    <span>{{ $user->created_at->format('d M Y') }}</span>
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
                                class="block px-4 py-2 hover:bg-gray-100">Edit</a>

                            <form action="" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">
                                Delete
                                </button>
                            </form>
                            </div>
                        </div>
                        </div>
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

