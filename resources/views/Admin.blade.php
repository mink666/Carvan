<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/2577a97aef.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Carvan Admin</title>
</head>
<body>
    <div class="min-h-screen flex bg-gray-100">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md flex-shrink-0">
          <div class="p-6 font-bold text-xl text-indigo-600">Carvan</div>
          <nav class="mt-4 text-gray-600">
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 hover:text-indigo-600 transition font-medium">Dashboard</a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">Starter Pages</a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">
                Car management
            </a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">Forms</a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">Report</a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">Charts</a>
            <a href="#" class="block px-6 py-3 hover:bg-indigo-100 transition">Icons</a>
          </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto">
          <h1 class="text-2xl font-semibold text-gray-700 mb-6">Dashboard</h1>

          <!-- Cards -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow rounded-lg p-4">
              <div class="flex items-center space-x-4">
                <div class="p-3 bg-green-100 rounded-full">
                  <i class="fas fa-shopping-cart text-green-500 text-xl"></i>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Total Orders</p>
                  <p class="text-lg font-bold">2415</p>
                </div>
              </div>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
              <div class="flex items-center space-x-4">
                <div class="p-3 bg-purple-100 rounded-full">
                  <i class="fas fa-dollar-sign text-purple-500 text-xl"></i>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Total Sale</p>
                  <p class="text-lg font-bold">$78.5K</p>
                </div>
              </div>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
              <div class="flex items-center space-x-4">
                <div class="p-3 bg-blue-100 rounded-full">
                  <i class="fas fa-eye text-blue-500 text-xl"></i>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Total Visits</p>
                  <p class="text-lg font-bold">145.2K</p>
                </div>
              </div>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
              <div class="flex items-center space-x-4">
                <div class="p-3 bg-orange-100 rounded-full">
                  <i class="fas fa-university text-orange-500 text-xl"></i>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Total Balance</p>
                  <p class="text-lg font-bold">$758K</p>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
</body>
</html>



