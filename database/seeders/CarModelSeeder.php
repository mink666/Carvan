<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarModel;
use App\Models\Brand;
use App\Models\RangeOfCar;
use App\Models\Inventory;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $toyota = Brand::where('name', 'Toyota')->firstOrFail();
        $honda = Brand::where('name', 'Honda')->firstOrFail();
        $ford = Brand::where('name', 'Ford')->firstOrFail();
        $hyundai = Brand::where('name', 'Hyundai')->firstOrFail();

        $sedan = RangeOfCar::where('name', 'Sedan')->firstOrFail();
        $suv = RangeOfCar::where('name', 'SUV')->firstOrFail();
        $pickup = RangeOfCar::where('name', 'Truck')->firstOrFail();
        $coupe = RangeOfCar::where('name', 'Coupe')->firstOrFail();
        $hatchback = RangeOfCar::where('name', 'Hatchback')->firstOrFail();

        $carModels =[
            // TOYOTA VIOS
            [
                'brand_id' => $toyota->id,
                'range_of_cars_id' => $sedan->id,
                'name' => 'Vios',
                'year' => 2025,
                'description' => 'The Toyota Vios is a reliable and fuel-efficient subcompact sedan, popular in Southeast Asian markets.',
                'image' => 'images/car_models/tytvios.png',
                'inventory' => [
                    'color' => 'Super White II',
                    'interior_color' => 'Black Fabric',
                    'price' => 479000000,
                    'features' => json_encode(['7-inch Touchscreen', 'Reverse Camera', 'ABS with EBD']),
                ]
            ],
            // HONDA CITY
            [
                'brand_id' => $honda->id,
                'range_of_cars_id' => $sedan->id,
                'name' => 'City',
                'year' => 2024,
                'description' => 'The Honda City is a stylish and spacious subcompact sedan known for its sporty appeal and advanced features.',
                'image' => 'images/car_models/hdcity.jpg',
                'inventory' => [
                    'color' => 'Black Metallic',
                    'interior_color' => 'Black Leatherette',
                    'price' => 559000000,
                    'features' => json_encode(['Honda SENSING', 'Paddle Shifters', 'LED Headlights']),
                ]
            ],
            // FORD FIESTA
            [
                'brand_id' => $ford->id,
                'range_of_cars_id' => $hatchback->id,
                'name' => 'Fiesta',
                'year' => 2024,
                'description' => 'The Ford Fiesta is a subcompact car known for its fun-to-drive character and nimble handling, offered in hatchback and sedan body styles in various markets.',
                'image' => 'images/car_models/ffiesta.png',
                'inventory' => [
                    'color' => 'Vannila Ice',
                    'interior_color' => 'Ebony Black Cloth',
                    'price' => 500000000,
                    'features' => json_encode(['SYNC 3 Infotainment', 'Alloy Wheels', 'Keyless Entry']),
                ]
            ],
            // HYUNDAI TUCSON
            [
                'brand_id' => $hyundai->id,
                'range_of_cars_id' => $suv->id,
                'name' => 'Tucson',
                'year' => 2024,
                'description' => 'The Hyundai Tucson is a compact SUV offering a bold design, a comfortable and tech-filled interior, and a range of efficient powertrain options.',
                'image' => 'images/car_models/huyntucson.png',
                'inventory' => [
                    'color' => 'Ignite Flame',
                    'interior_color' => 'Black Leather',
                    'price' => 850000000,
                    'features' => json_encode(['10.25-inch Touchscreen', 'Panoramic Sunroof', 'Hyundai SmartSense']),
                ]
            ],
        ];

        foreach ($carModels as $carModelData) {
            $inventory =   $carModelData['inventory'] ?? null;
            unset($carModelData['inventory']);

            $carModel = CarModel::firstOrCreate(
                [
                    'brand_id' => $carModelData['brand_id'],
                    'name' => $carModelData['name'],
                    'year' => $carModelData['year'],
                ],
                $carModelData
            );

            if ($carModel && $inventory) {
                $inventory ['car_model_id'] = $carModel->id;

                Inventory::updateOrCreate(
                    [
                        'car_model_id' => $inventory['car_model_id'],
                        'color' => $inventory['color'],
                    ],
                    $inventory
                );
            }
        }
    }
}
