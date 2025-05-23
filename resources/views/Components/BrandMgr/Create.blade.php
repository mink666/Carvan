<div class="max-w-8xl w-full mx-auto bg-white shadow-xl rounded-xl overflow-hidden flex">

    <form action="{{ route('Admin.BrandMgr.store') }}" method="POST" enctype="multipart/form-data" class="flex w-full">
        @csrf
        <!-- Bên trái: Upload Image -->
        <div class="w-1/2 p-6 flex flex-col">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Create Brand</h2>

            <div class="flex-grow p-2 border border-dashed border-gray-300 rounded-md bg-white flex flex-col items-center ">
                <!-- Preview image -->
                <img id="previewImage" src="{{ asset('images/CarVanLogo.png') }}" alt="Preview" class="w-80 h-80 object-contain rounded-md" />

                {{-- Upload Image --}}
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Brand logo</label>
                    <input id="imageInput" type="file" name="logo" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#f1912b]">
                </div>
                <!-- motto -->
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Motto</label>
                    <input type="text" name="motto"  class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Website_url</label>
                    <input type="text" name="website_url"  class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
            </div>
        </div>

        <!--  Form input -->
        <div class="w-1/2 p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-building mr-2"></i>
                    <h2 class="text-lg font-semibold text-gray-700">Brand Information</h2>
                </div>
                <button type="button" class="text-gray-400 hover:text-black text-5xl">
                    <a href="/Admin/BrandMgr?state=list">
                        &times;
                    </a>
                </button>
            </div>

            <!-- Form fields -->
            <div class="space-y-4 flex-grow">
                <!-- Brand Name -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name"  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <!-- Companyfullname -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Company full name</label>
                    <input type="text" name="company_full_name"  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                </div>
                <!-- Year -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Year</label>
                    <input type="text" name="year"  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                </div>
                <!-- founder -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Founder</label>
                    <input type="text" name="founder"  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                </div>
                <!-- Description -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" class="w-full h-36 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black"></textarea>
                </div>
                <!-- Location -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Location</label>
                    <input name="location" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black"></input>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Active</label>
                   <select name="is_active" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                       <option value="1" {{ old('is_active', $brand->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                       <option value="0" {{ old('is_active', $brand->is_active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                   </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-6">
                <a href="/Admin/BrandMgr?state=list" class="text-gray-700">
                    <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 font-semibold rounded-md hover:bg-gray-300">
                        Cancel
                      </button>
                </a>
                <button type="submit" class="px-4 py-2 bg-[#ff3131] text-white font-semibold rounded-md hover:bg-[#B20710]">Save now</button>
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
            previewImage.src = "{{ asset('images/placeholder.png') }}";
        }
    });
</script>
