<div class="max-w-8xl w-full mx-auto bg-white shadow-xl rounded-xl overflow-hidden flex">

    <form action="{{route('Admin.PreOwnedMgr.store')}}" method="POST" enctype="multipart/form-data" class="flex w-full">
        @csrf
        <!-- Bên trái: Upload Image -->
        <div class="w-1/2 p-6 flex flex-col">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Create PreOwned Car</h2>

            <div class="flex-grow p-2 border border-dashed border-gray-300 rounded-md bg-white flex flex-col items-center ">
                <!-- Preview image -->
                <img id="previewImage" src="{{ asset('images/CarVanLogo.png') }}" alt="Preview" class="w-80 h-80 object-contain rounded-md" />

                {{-- Upload Image --}}
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Car Image</label>
                    <input id="imageInput" type="file" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#f1912b]">
                </div>
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="number" name="price"  class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Purchase date</label>
                    <input type="datetime-local" name="purchase_date"  class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>

            </div>
        </div>


        <div class="w-1/2 p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-car-side mr-2"></i>
                    <h2 class="text-lg font-semibold text-gray-700">Car PreOwned Information</h2>
                </div>
                <button type="button" class="text-gray-400 hover:text-black text-5xl">
                    <a href="/Admin/PreOwnedMgr?state=list">
                        &times;
                    </a>
                </button>
            </div>

            <!-- Form fields -->
            <div class="space-y-4 flex-grow">
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">

                </div>

                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Mileage</label>
                    <input id="yearInput" type="text" name="mileage"  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                </div>
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Story</label>
                    <textarea name="story" class="w-full h-36 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black"></textarea>
                </div>
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                    <input type="text" name="color" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Condition</label>
                    <select name="condition" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                        <option value="excellent">Excellent</option>
                        <option value="very good">Very Good</option>
                        <option value="good">Good</option>
                        <option value="fair">Fair</option>
                        <option value="poor">Poor</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-6">
                    <button onclick="window.location.href='/Admin/PreOwnedMgr?state=list'" type="button" class="px-4 py-2 bg-gray-100 text-gray-700 font-semibold rounded-md hover:bg-gray-300">
                        Cancel
                      </button>

                <button type="submit" class="px-4 py-2 bg-[#ff3131] text-white font-semibold rounded-md hover:bg-[#B20710]">
                    Save now
                </button>
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

    const yearInput = document.getElementById('yearInput');
    const errorMsg = document.getElementById('errorMsg');

  yearInput.addEventListener('input', () => {
    const value = parseInt(yearInput.value);
    if (value < 2000 || value > 2025) {
      errorMsg.classList.remove('hidden');
      yearInput.classList.add('border-red-500', 'focus:ring-red-500');
    } else {
      errorMsg.classList.add('hidden');
      yearInput.classList.remove('border-red-500', 'focus:ring-red-500');
    }
  });
</script>
