<div x-data="newsCrud()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">News Management</h1>
        <button @click="showAddModal = true"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add News</button>
    </div>
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach (\App\Models\News::orderBy('date', 'desc')->get() as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Image"
                                    class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">No image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                            <button
                                @click="openEditModal({{ $item->id }}, '{{ addslashes($item->title) }}', `{{ addslashes($item->content) }}`, '{{ $item->date }}', '{{ $item->image }}')"
                                class="text-blue-600 hover:underline">Edit</button>
                            <form action="{{ route('news.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Delete this news?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal Add News -->
    <div x-show="showAddModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40"
        style="display: none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
            <button @click="showAddModal = false"
                class="absolute top-2 right-2 text-gray-400 hover:text-black text-2xl">&times;</button>
            <h2 class="text-xl font-semibold mb-4">Add News</h2>
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Content</label>
                    <textarea name="content" class="w-full border px-3 py-2 rounded" rows="4" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Image</label>
                    <input type="file" name="image" class="w-full border px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Date</label>
                    <input type="date" name="date" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="showAddModal = false"
                        class="mr-2 px-4 py-2 rounded border">Cancel</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Save</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Edit News -->
    <div x-show="showEditModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40"
        style="display: none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
            <button @click="showEditModal = false"
                class="absolute top-2 right-2 text-gray-400 hover:text-black text-2xl">&times;</button>
            <h2 class="text-xl font-semibold mb-4">Edit News</h2>
            <form :action="editActionUrl" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input type="text" name="title" class="w-full border px-3 py-2 rounded" x-model="editTitle"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Content</label>
                    <textarea name="content" class="w-full border px-3 py-2 rounded" rows="4" x-model="editContent" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Image (leave blank to keep current)</label>
                    <input type="file" name="image" class="w-full border px-3 py-2 rounded">
                    <template x-if="editImage">
                        <img :src="editImageUrl" alt="Current Image" class="w-16 h-16 object-cover rounded mt-2">
                    </template>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Date</label>
                    <input type="date" name="date" class="w-full border px-3 py-2 rounded" x-model="editDate"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="showEditModal = false"
                        class="mr-2 px-4 py-2 rounded border">Cancel</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function newsCrud() {
        return {
            showAddModal: false,
            showEditModal: false,
            editId: null,
            editTitle: '',
            editContent: '',
            editDate: '',
            editImage: '',
            editImageUrl: '',
            editActionUrl: '',
            openEditModal(id, title, content, date, image) {
                this.editId = id;
                this.editTitle = title;
                this.editContent = content;
                this.editDate = date;
                this.editImage = image;
                this.editImageUrl = image ? '/storage/' + image : '';
                this.editActionUrl = `/admin/news/${id}`;
                this.showEditModal = true;
            }
        }
    }
</script>
