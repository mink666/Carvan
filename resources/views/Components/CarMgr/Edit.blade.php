<div class="max-w-8xl w-full mx-auto bg-white shadow-xl rounded-xl overflow-hidden flex">

    <form action="{{ route('Admin.CarMgr.update',['id' => $carModel->id]) }}" method="POST" enctype="multipart/form-data" class="flex w-full">
        @csrf
        @method('PUT')

        <div class="w-1/2 p-6 flex flex-col">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Update Car</h2>

            <div class="flex-grow p-2 border border-dashed border-gray-300 rounded-md bg-white flex flex-col items-center ">
                <!-- Preview image -->
                <img id="previewImage" src="{{ asset('' . $carModel->image) }}" alt="Preview" class="w-80 h-80 object-contain rounded-md" />

                {{-- Upload Image --}}
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Car Image</label>
                    <input id="imageInput" type="file" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#f1912b]">
                </div>
                <!-- Color -->
                @php $inventory = $carModel->inventories->first(); @endphp
                <div class="w-full">
                    {{-- @php   dump($carModel->inventories); @endphp --}}
                    <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                    <input type="text" name="color" value="{{ $inventory->color ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <!-- Price -->
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="number" name="price" value="{{ $inventory->price ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <!-- Is Active -->
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Active</label>
                    <select name="is_active" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                        <option value="1" {{ (isset($inventory) && $inventory->is_active) ? 'selected' : '' }}>Sale</option>
                        <option value="0" {{ (isset($inventory) && !$inventory->is_active) ? 'selected' : '' }}>Sold</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="w-1/2 p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-car-side mr-2"></i>
                    <h2 class="text-lg font-semibold text-gray-700">Car Information</h2>
                </div>
                <button type="button" class="text-gray-400 hover:text-black text-5xl">
                    <a href="/Admin/CarMgr?state=list">
                        &times;
                    </a>
                </button>
            </div>

            <!-- Form fields -->
            <div class="space-y-4 flex-grow">
                <!-- Car Id -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ID</label>
                    <input type="text" name="id" value="{{$carModel ->id}}" class="w-full text-sm px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                </div>
                <!-- Car Name-->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                    <select name="brand_id" class="w-full text-sm px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                        <option value="" disabled selected>Select a Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $carModel->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Range -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Range</label>
                    <select name="range_of_cars_id" class="w-full text-sm px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                        <option value="" disabled selected>Select a Range</option>
                        @foreach($ranges as $range)
                            <option value="{{ $range->id }}" {{ $carModel->range_of_cars_id == $range->id ? 'selected' : '' }}>{{ $range->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">name</label>
                    <input type="text" value="{{$carModel->name}}" name="name"  class="w-full text-sm px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black ">
                </div>

                <!-- Year -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                    <input type="text" value="{{$carModel->year}}" name="year"  class="w-full text-sm px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black ">

                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description"  class="w-full text-sm h-36 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black" >{{$carModel->description}}</textarea>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-6">
                <a href="/Admin/CarMgr?state=list" class="text-gray-700">
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
            previewImage.src = "{{ asset('images/placeholder.png') }}"; // Nếu không có file, hiển thị ảnh mặc định
        }
    });
</script>
