<form action="{{ route('Admin.UserMgr.update',['id' => $users->id]) }}" method="POST" >
@csrf
@method('PUT')
<div x-data="{username: '{{$users->username ?? ''}}', email: '{{$users->email ?? ''}}', name: '{{$users->name ?? ''}}' , showPassword: false, showConfirmPassword: false}" class="flex flex-col md:flex-row gap-8 p-6 bg-white rounded-xl shadow-md">
    <!-- Left Profile Card -->
    <div class="w-full md:w-1/3 flex flex-col items-center text-center">
        <div class="relative">
            <img src="{{ asset('images/UserLogo.png') }}" alt="Profile" class="rounded-full w-32 h-32 object-cover">

        </div>
        <h2 class="mt-4 text-xl font-semibold" x-text="username"></h2>
        <p class="text-gray-500 text-sm" x-text="email">
            <i class="fas fa-map-marker-alt mr-1" ></i>Your Email
        </p>
        <div class="flex items-center mt-2 text-yellow-500">
            <i class="fas fa-star mr-1"></i> <span class="text-sm font-medium">5.0</span> <span class="text-gray-400 text-xs ml-1">(1)</span>
            <span class="ml-2 text-xs bg-gray-200 text-gray-600 px-2 py-0.5 rounded" x-text="name"></span>
        </div>
        <a href="{{route('Admin.UserMgr')}}" class="mt-4 text-red-500 text-sl hover:underline">Cancel</a>
    </div>

    <!-- Right Form -->
    <div class="w-full md:w-2/3 space-y-6">
        <!-- User Info -->
        <div>
            <h3 class="text-lg font-semibold mb-4">User Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">ID</label>
                    <input type="text" name="id" value="{{$users->id}}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" x-model="username" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" x-model="email"  class="w-full border rounded px-3 py-2 bg-gray-100 text-gray-600" />
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" name="name" x-model="name" class="w-full border rounded px-3 py-2 bg-gray-100 text-gray-600" />
                </div>
                <div class="md:col-span-2" x-data="{ role: 'user' }">
                    <label class="block text-sm font-medium mb-1">Role</label>
                    <select  name="role" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        <option value="user" {{ $users->role == 'user' ? 'selected' : '' }}>user</option>
                        <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>admin</option>
                        <option value="sale" {{ $users->role == 'sale' ? 'selected' : '' }}>sale</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Password Update -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Password</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">New Password</label>
                    <div class="relative">
                        <input name="password" :type="showPassword ? 'text' : 'password'" placeholder="New Password" class="w-full border rounded px-3 py-2 pr-10 focus:outline-none" />
                        <button type="button" @click="showPassword = !showPassword" class="absolute right-3 top-2.5 text-gray-500">
                            <i :class="showPassword ? 'fas fa-eye' : 'fas fa-eye-slash'"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Confirm New Password</label>
                    <div class="relative">
                        <input name="password_confirmation" :type="showConfirmPassword ? 'text' : 'password'" placeholder="Confirm New Password" class="w-full border rounded px-3 py-2 pr-10 focus:outline-none" />
                        <button type="button" @click="showConfirmPassword = !showConfirmPassword" class="absolute right-3 top-2.5 text-gray-500">
                            <i :class="showConfirmPassword ? 'fas fa-eye' : 'fas fa-eye-slash'"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="pt-4">
            <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Save Now</button>
        </div>
    </div>
</div>
</form>
