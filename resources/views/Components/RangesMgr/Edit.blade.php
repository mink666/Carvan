<div class="max-w-8xl w-full mx-auto bg-white shadow-xl rounded-xl overflow-hidden flex">

    <form action="{{ route('Admin.RangesMgr.update',['id' => $range->id]) }}" method="POST" enctype="multipart/form-data" class="flex w-full">
        @csrf
        @method('PUT')
        <div class="w-1/2 p-6 flex flex-col">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Update Range</h2>

            <div class="flex-grow p-2 border border-dashed border-gray-300 rounded-md bg-white flex flex-col items-center ">
                <!-- Preview image -->
                <img id="previewImage" src="{{ asset('images/RangeofCarOverView.jpg') }}" alt="Preview" class="w-130 h-130 object-contain rounded-md" />

            </div>
        </div>
        <!-- Bên phải: Form nhập thông tin -->
        <div class="w-1/2 p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-car mr-2"></i>
                    <h2 class="text-lg font-semibold text-gray-700">Range Information</h2>
                </div>
                <button type="button" class="text-gray-400 hover:text-black text-5xl">
                    <a href="/Admin/RangesMgr?state=list">
                        &times;
                    </a>
                </button>
            </div>

            <!-- Form fields -->
            <div class="space-y-4 flex-grow">
                <!-- Range ID -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">ID</label>
                    <input type="text" name="id" value="{{$range ->id}}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                </div>
                <!-- Range name -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Range name</label>
                    <input type="text" name="name" value="{{$range ->name}}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                </div>
                <!-- Description -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description"  class="w-full h-36 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black" >{{$range->description}}</textarea>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-6">
                <a href="/Admin/RangesMgr?state=list" class="text-gray-700">
                    <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 font-semibold rounded-md hover:bg-gray-300">
                        Cancel
                      </button>
                </a>
                <button type="submit" class="px-4 py-2 bg-[#ff3131] text-white font-semibold rounded-md hover:bg-[#B20710]">Save now</button>
            </div>

        </div>
    </form>
</div>

