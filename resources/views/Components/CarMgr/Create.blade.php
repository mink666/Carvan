<div class="max-w-7xl w-full mx-auto bg-white shadow-xl rounded-xl overflow-hidden flex">

    <form action="" method="POST" enctype="multipart/form-data" class="flex w-full">
        @csrf

        <!-- Bên trái: Upload Image -->
        <div class="w-1/2 p-6 flex flex-col">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Create Picture Car</h2>

            <div class="flex-grow p-2 border border-dashed border-gray-300 rounded-md bg-white flex flex-col items-center ">
                <!-- Preview image -->
                <img id="previewImage" src="{{ asset('images/placeholder.png') }}" alt="Preview" class="w-80 h-80 object-contain rounded-md" />

                {{-- Upload Image --}}
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload  Book Image</label>
                    <input id="imageInput" type="file" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#f1912b]">
                </div>
            </div>
        </div>

        <!-- Bên phải: Form nhập thông tin -->
        <div class="w-1/2 p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Create new Book Information</h2>
                <button type="button" class="text-gray-400 hover:text-black text-4xl">&times;</button>
            </div>

            <!-- Form fields -->
            <div class="space-y-4 flex-grow">
                <!-- Book Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Book name</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#f1912b]">
                </div>

                <!-- Author -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                    <input type="text" name="author" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#f1912b]">
                </div>

                <!-- Chapter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Chapter</label>
                    <input type="text" name="chapter" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#f1912b]">
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#f1912b]"></textarea>
                </div>

                <!-- Review -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Review</label>
                    <input type="text" name="review" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#f1912b]">
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                    <input type="text" name="tag" placeholder="Type to search..." class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ url('/Admin/ListBook') }}" class="text-gray-700">
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                        Cancel
                    </button>
                </a>
                <button type="submit" class="px-4 py-2 bg-[#f1912b] text-white font-semibold rounded-md hover:bg-[#e47a18]">Save now</button>
            </div>

        </div>
    </form>
</div>


<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Lấy file được chọn
        const previewImage = document.getElementById('previewImage'); // Lấy thẻ img để hiển thị preview

        if (file) {
            const reader = new FileReader(); // Tạo FileReader để đọc file
            reader.onload = function(e) {
                previewImage.src = e.target.result; // Gán src của ảnh bằng kết quả đọc file
            };
            reader.readAsDataURL(file); // Đọc file dưới dạng Data URL
        } else {
            previewImage.src = "{{ asset('images/placeholder.png') }}"; // Nếu không có file, hiển thị ảnh mặc định
        }
    });
</script>
