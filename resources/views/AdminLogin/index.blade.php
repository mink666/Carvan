<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - CarVan Admin</title>
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">

  <div class="w-full max-w-6xl flex flex-col md:flex-row bg-white shadow-xl rounded-2xl overflow-hidden">

    <!-- Left Image/Graphic -->
    <div class="hidden md:flex w-1/2 bg-white from-indigo-100 to-indigo-200 items-center justify-center">
      <img src="{{ asset('images/CarVanLogo.png') }}" alt="CarVan Graphic" class="w-3/4 h-auto">
    </div>

    <!-- Login Form -->
    <div class="w-full md:w-1/2 p-10">
      <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-800">Welcome to <span class="text-red-600">Admin CarVan</span></h1>
        <p class="text-sm text-gray-500 mt-1">Sign in to manage test drives and agents.</p>
      </div>

      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <!-- Email -->
        @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
              <i class="fas fa-envelope"></i>
            </span>
            <input name="email" type="email" placeholder="Enter your email" class="pl-10 pr-4 py-2 w-full border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
          </div>
        </div>

        <!-- Password -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input name="password" type="password" placeholder="Enter your password" class="pl-10 pr-4 py-2 w-full border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
          </div>
        </div>

        <!-- Remember and Forgot -->
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center space-x-2">
            <input type="checkbox" class="form-checkbox text-indigo-600" />
            <span>Remember Me</span>
          </label>
          <a href="#" class="text-indigo-600 hover:underline">Forgot Password?</a>
        </div>

        <!-- Submit -->
        <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">Login</button>
      </form>
    </div>
  </div>

</body>
</html>
