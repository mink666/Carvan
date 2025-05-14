<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarModel;
use App\Models\Inventory;
use App\Models\Preowned;
use App\Models\Brand;
use Carbon\Carbon;

class PreownedVehicleSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Starting PreownedVehicleSeeder...');

        // Danh sách các xe cũ bạn muốn tạo.
        $preownedCarEntries = [
            [
                'car_model_query' => ['brand_name' => 'Toyota', 'model_name' => 'Corolla Altis', 'year' => 2021],
                'inventory_data' => [
                    'color' => 'Phantom Silver PO', 'interior_color' => 'Black Leather PO', 'price' => 700000000,
                    'features' => json_encode(['Sunroof', '7 Airbags', 'LED Headlights']), 'quantity' => 1, 'status' => 'sale',
                ],
                'preowned_data' => [
                    'mileage' => 25000, 'story' => 'Carefully used by first owner, full service records for Toyota Corolla Altis 2021.', 'condition' => 'Excellent',
                    'purchase_date' => Carbon::parse('2023-05-10')->toDateString(), 'price' => 650000000,
                    'image' => 'images/preowned_cars/toyota_altis_2021_silver.jpg'
                ]
            ],
            [
                'car_model_query' => ['brand_name' => 'Honda', 'model_name' => 'CR-V', 'year' => 2020],
                'inventory_data' => [
                    'color' => 'Modern Steel PO', 'interior_color' => 'Black Leather PO', 'price' => 950000000,
                    'features' => json_encode(['Honda SENSING', 'Panoramic Roof']), 'quantity' => 1, 'status' => 'sale',
                ],
                'preowned_data' => [
                    'mileage' => 42000, 'story' => 'Reliable family SUV, non-smoker, no accidents for Honda CR-V 2020.', 'condition' => 'Very Good',
                    'purchase_date' => Carbon::parse('2022-11-15')->toDateString(), 'price' => 870000000,
                    'image' => 'images/preowned_cars/honda_crv_2020_steel.jpg'
                ]
            ],
            // Thêm 8 mẫu xe khác từ các hãng khác nhau (đã có ở lần trước)
            // Đảm bảo tên model và năm khớp với những gì CarModelSeeder đã tạo
            [
                'car_model_query' => ['brand_name' => 'Ford', 'model_name' => 'Ranger', 'year' => 2022], // Giả sử CarModelSeeder tạo 'Ranger', không phải 'Ranger Wildtrak'
                'inventory_data' => ['color' => 'Conquer Grey PO', 'interior_color' => 'Ebony with Orange Stitching PO', 'price' => 900000000, 'features' => json_encode(['SYNC 3', 'Off-road Package']), 'quantity' => 1, 'status' => 'sale'],
                'preowned_data' => ['mileage' => 18000, 'story' => 'Powerful pickup, excellent for adventures. Ford Ranger 2022.', 'condition' => 'Excellent', 'purchase_date' => Carbon::parse('2023-08-01')->toDateString(), 'price' => 830000000, 'image' => 'images/preowned_cars/ford_ranger_2022_black.jpg']
            ],
            [
                'car_model_query' => ['brand_name' => 'Hyundai', 'model_name' => 'Tucson', 'year' => 2021],
                'inventory_data' => ['color' => 'Amazon Gray PO', 'interior_color' => 'Gray Two-Tone Leather PO', 'price' => 820000000, 'features' => json_encode(['Smart Cruise Control', 'Bose Audio']), 'quantity' => 1, 'status' => 'sale'],
                'preowned_data' => ['mileage' => 33000, 'story' => 'Comfortable and stylish SUV. Hyundai Tucson 2021.', 'condition' => 'Very Good', 'purchase_date' => Carbon::parse('2023-01-20')->toDateString(), 'price' => 750000000, 'image' => 'images/preowned_cars/hyundai_tucson_2021_black.jpg']
            ],
            [
                'car_model_query' => ['brand_name' => 'Mazda', 'model_name' => 'CX-5', 'year' => 2022],
                'inventory_data' => ['color' => 'Soul Red Crystal PO', 'interior_color' => 'Black Leather PO', 'price' => 990000000, 'features' => json_encode(['i-Activsense', 'Sunroof']), 'quantity' => 1, 'status' => 'sale'],
                'preowned_data' => ['mileage' => 15000, 'story' => 'Premium feel crossover, low mileage. Mazda CX-5 2022.', 'condition' => 'Excellent', 'purchase_date' => Carbon::parse('2023-10-05')->toDateString(), 'price' => 920000000, 'image' => 'images/preowned_cars/mazda_cx5_2022_red.jpg']
            ],
            [
                'car_model_query' => ['brand_name' => 'Kia', 'model_name' => 'Seltos', 'year' => 2021], // Đảm bảo Seltos đã được CarModelSeeder tạo
                'inventory_data' => ['color' => 'Starbright Yellow PO', 'interior_color' => 'Black SynTex PO', 'price' => 720000000, 'features' => json_encode(['10.25-inch Touchscreen', 'Bose Audio']), 'quantity' => 1, 'status' => 'sale'],
                'preowned_data' => ['mileage' => 28000, 'story' => 'Fun and funky compact SUV. Kia Seltos 2021.', 'condition' => 'Very Good', 'purchase_date' => Carbon::parse('2023-03-12')->toDateString(), 'price' => 670000000, 'image' => 'images/preowned_cars/kia_seltos_2021_yellow.jpg']
            ],
            [
                'car_model_query' => ['brand_name' => 'Nissan', 'model_name' => 'Kicks', 'year' => 2020], // Đảm bảo Kicks đã được CarModelSeeder tạo
                'inventory_data' => ['color' => 'Gun Metallic PO', 'interior_color' => 'Charcoal Sport Cloth PO', 'price' => 600000000, 'features' => json_encode(['Bose Personal Plus Audio', 'Around View Monitor']), 'quantity' => 1, 'status' => 'sale'],
                'preowned_data' => ['mileage' => 48000, 'story' => 'Great city crossover. Nissan Kicks 2020.', 'condition' => 'Good', 'purchase_date' => Carbon::parse('2022-09-01')->toDateString(), 'price' => 530000000, 'image' => 'images/preowned_cars/nissan_kicks_2020_gray.jpg']
            ],
            [
                'car_model_query' => ['brand_name' => 'Subaru', 'model_name' => 'Forester', 'year' => 2019], // Đảm bảo Forester đã được CarModelSeeder tạo
                'inventory_data' => ['color' => 'Jasper Green PO', 'interior_color' => 'Gray StarTex PO', 'price' => 950000000, 'features' => json_encode(['Symmetrical AWD', 'EyeSight']), 'quantity' => 1, 'status' => 'sale'],
                'preowned_data' => ['mileage' => 65000, 'story' => 'Rugged and reliable. Subaru Forester 2019.', 'condition' => 'Good', 'purchase_date' => Carbon::parse('2022-05-20')->toDateString(), 'price' => 850000000, 'image' => 'images/preowned_cars/subaru_forester_2019_green.jpg']
            ],
            [
                'car_model_query' => ['brand_name' => 'Volkswagen', 'model_name' => 'Tiguan', 'year' => 2020], // Đảm bảo Tiguan đã được CarModelSeeder tạo
                'inventory_data' => ['color' => 'Pure White PO', 'interior_color' => 'Storm Gray Leatherette PO', 'price' => 1100000000, 'features' => json_encode(['Digital Cockpit', 'Panoramic Sunroof']), 'quantity' => 1, 'status' => 'sale'],
                'preowned_data' => ['mileage' => 40000, 'story' => 'Comfortable German SUV. VW Tiguan 2020.', 'condition' => 'Very Good', 'purchase_date' => Carbon::parse('2022-12-01')->toDateString(), 'price' => 980000000, 'image' => 'images/preowned_cars/vw_tiguan_2020_white.jpg']
            ],
            [
                'car_model_query' => ['brand_name' => 'Volvo', 'model_name' => 'XC40', 'year' => 2021], // Đảm bảo XC40 đã được CarModelSeeder tạo
                'inventory_data' => ['color' => 'Glacier Silver PO', 'interior_color' => 'Charcoal Leather PO', 'price' => 1700000000, 'features' => json_encode(['City Safety', 'Sensus Connect']), 'quantity' => 1, 'status' => 'sale'],
                'preowned_data' => ['mileage' => 22000, 'story' => 'Stylish and safe compact luxury SUV. Volvo XC40 2021.', 'condition' => 'Excellent', 'purchase_date' => Carbon::parse('2023-06-15')->toDateString(), 'price' => 1550000000, 'image' => 'images/preowned_cars/volvo_xc40_2021_silver.jpg']
            ],
        ];

        $seededPreownedCount = 0;
foreach ($preownedCarEntries as $entry) {
    $brand = Brand::where('name', $entry['car_model_query']['brand_name'])->first();

    if (!$brand) {
        $this->command->warn("Preowned Seeder: Brand '{$entry['car_model_query']['brand_name']}' not found. Skipping entry for {$entry['car_model_query']['model_name']}.");
        continue;
    }

    // Tìm CarModel đã tồn tại (được tạo bởi CarModelSeeder)
    $carModel = CarModel::where('brand_id', $brand->id)
                        ->where('name', $entry['car_model_query']['model_name'])
                        ->where('year', $entry['car_model_query']['year'])
                        ->first();

    if (!$carModel) {
        $this->command->warn("Preowned Seeder: CarModel '{$brand->name} {$entry['car_model_query']['model_name']} ({$entry['car_model_query']['year']})' not found. Skipping entry.");
        continue;
    }
    $this->command->info("Found CarModel: {$brand->name} {$carModel->name} ({$carModel->year}) for preowned seeding.");

    // Tạo một entry Inventory MỚI cho xe pre-owned này
    $inventoryData = $entry['inventory_data'];
    $inventoryData['car_model_id'] = $carModel->id;
    $inventoryData['is_preowned'] = true; // QUAN TRỌNG

    $newInventory = Inventory::updateOrCreate(
        [
            'car_model_id' => $inventoryData['car_model_id'],
            'color'        => $inventoryData['color'],
            'is_preowned'  => true
        ],
        $inventoryData
    );

    // Force update the inventory record to ensure is_preowned is true even if it existed with a different value.
    $newInventory->update(['is_preowned' => true]);

    if ($newInventory) {
        $this->command->info("Preowned Inventory created/updated with ID: {$newInventory->id} for {$carModel->name}");

        if ($newInventory->preowned()->exists()) {
            $this->command->line("<fg=yellow>Preowned record already exists for Inventory ID: {$newInventory->id}. Attempting to update it.</>");
            // If you wish to update, you might call:
            // $newInventory->preowned->update($entry['preowned_data']);
            // Otherwise, you can choose to continue.
        }

        $preownedData = $entry['preowned_data'];
        $preownedData['inventory_id'] = $newInventory->id;

        // Use updateOrCreate for Preowned record to be safe on re-running the seeder
        Preowned::updateOrCreate(
            ['inventory_id' => $newInventory->id],
            $preownedData
        );
        $this->command->info("Seeded/Updated preowned detail for: " . $brand->name . " " . $carModel->name);
        $seededPreownedCount++;
    } else {
        $this->command->error("Failed to create/update Inventory for preowned: " . $brand->name . " " . $carModel->name);
    }
}
$this->command->info($seededPreownedCount . ' pre-owned vehicle entries processed in PreownedVehicleSeeder.');
    }
}
