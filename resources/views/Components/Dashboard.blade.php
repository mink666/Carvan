<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-orange-500 text-white p-6 rounded shadow flex items-center justify-between">
            <div>
                <h3 class="text-sl">Total Cars</h3>
                <p class="text-2xl font-bold">{{$carCountsByBrand->count()}}</p>
            </div>
            <i class="fas fa-car-side text-4xl"></i>
        </div>
        <div class="bg-green-500 text-white p-6 rounded shadow flex items-center justify-between">
            <div>
                <h3 class="text-sm">Brand</h3>
                <p class="text-2xl font-bold">1697+</p>
            </div>
            <i class="fas fa-building text-4xl"></i>
        </div>
        <div class="bg-purple-500 text-white p-6 rounded shadow flex items-center justify-between">
            <div>
                <h3 class="text-sm">Ranges</h3>
                <p class="text-2xl font-bold">85k+</p>
            </div>
            <i class="fas fa-car text-4xl"></i>
        </div>
        <div class="bg-blue-500 text-white p-6 rounded shadow flex items-center justify-between">
            <div>
                <h3 class="text-sm">News</h3>
                <p class="text-2xl font-bold">2167+</p>
            </div>
            <i class="fas fa-newspaper text-4xl"></i>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Brands</h2>
            <canvas id="carsByBrandChart"></canvas>
        </div>

        {{-- Line Chart --}}
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Ranges</h2>
            <canvas id="carCountsByRange" class="mx-auto" style="max-width: 500px; max-height: 500px;"></canvas>
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded shadow text-center">
                <p class="text-sm text-gray-500 mb-2">74% Recommended</p>
                <img src="{{ asset('images/car_models/ffiesta.png') }}" alt="Car" class="w-full h-40 object-contain mb-2">
                <p class="font-semibold">Car Model 1</p>
            </div>
            <div class="bg-white p-4 rounded shadow text-center">
                <p class="text-sm text-gray-500 mb-2">82% Recommended</p>
                <img src="{{ asset('images/car_models/hdcity.jpg') }}" alt="Car" class="w-full h-40 object-contain mb-2">
                <p class="font-semibold">Car Model 2</p>
            </div>
            <div class="bg-white p-4 rounded shadow text-center">
                <p class="text-sm text-gray-500 mb-2">85% Recommended</p>
                <img src="{{ asset('images/car_models/tytvios.png') }}" alt="Car" class="w-full h-40 object-contain mb-2">
                <p class="font-semibold">Car Model 3</p>
            </div>
    </div>

</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const carCountsByBrand = @json($carCountsByBrand);
    const carCountsByRange = @json($carCountsByRange);
    const labels = carCountsByBrand.map(item => item.brand);
    const data = carCountsByBrand.map(item => item.total);

    const rangeLabels  = carCountsByRange.map(item => item.range);
    const rangeData  = carCountsByRange.map(item => item.total);

    const ctx = document.getElementById('carsByBrandChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Cars by Brand',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });

    // Line Chart
    const ctxPie = document.getElementById('carCountsByRange').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: rangeLabels,
            datasets: [{
                label: 'Ranges by Var',
                data: rangeData,
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF',
                    '#FF9F40',
                    '#C9CBCF',
                    '#8B0000',
                    '#228B22',
                    '#008080'
                ],
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.label || '';
                            let value = context.raw;
                            return `${label}: ${value} Cars`;
                        }
                    }
                }
            }
        }
    });
</script>

