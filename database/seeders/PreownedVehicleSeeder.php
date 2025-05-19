<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarModel;
use App\Models\Inventory;
use App\Models\Preowned;
use App\Models\Brand;
use App\Models\RangeOfCar;
use Carbon\Carbon;

class PreownedVehicleSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Starting PreownedVehicleSeeder...');

        // Lấy các brands và range_of_cars cần thiết
        $toyota = Brand::where('name', 'Toyota')->firstOrFail();
        $honda = Brand::where('name', 'Honda')->firstOrFail();
        $ford = Brand::where('name', 'Ford')->firstOrFail();
        $hyundai = Brand::where('name', 'Hyundai')->firstOrFail();
        $mazda = Brand::where('name', 'Mazda')->firstOrFail();
        $kia = Brand::where('name', 'Kia')->firstOrFail();
        $nissan = Brand::where('name', 'Nissan')->firstOrFail();
        $subaru = Brand::where('name', 'Subaru')->firstOrFail();
        $volkswagen = Brand::where('name', 'Volkswagen')->firstOrFail();
        $volvo = Brand::where('name', 'Volvo')->firstOrFail();

        // Lấy range of cars
        $sedan = RangeOfCar::where('name', 'Sedan')->firstOrFail();
        $suv = RangeOfCar::where('name', 'SUV (Sport Utility Vehicle)')->firstOrFail();
        $pickup = RangeOfCar::where('name', 'Pickup Truck')->firstOrFail();

        $preownedData = [
            [
                'car_model' => [
                    'brand_id' => $toyota->id,
                    'range_of_cars_id' => $sedan->id,
                    'name' => 'Corolla Altis',
                    'year' => 2021,
                    'description' => 'The Toyota Corolla Altis 2021 offers a perfect blend of style, comfort, and reliability.',
                ],
                'preowned' => [
                    'mileage' => 45000,
                    'price' => 972000000,
                    'condition' => 'Excellent',
                    'color' => 'Silver Metallic',
                    'interior_color' => 'Black Fabric',
                    'purchase_date' => Carbon::create(2021, 1, 15)->toDateString(),
                    'features' => json_encode(['Backup Camera', 'Bluetooth', 'Keyless Entry']),
                    'image' => 'images/preowned/Altis2021.jpeg'
                ]
            ],
            [
                'car_model' => [
                    'brand_id' => $honda->id,
                    'range_of_cars_id' => $suv->id,
                    'name' => 'CR-V',
                    'year' => 2020,
                    'description' => 'The Honda CR-V 2020 is a versatile and reliable SUV perfect for families.',
                ],
                'preowned' => [
                    'mileage' => 52000,
                    'price' => 1147500000,
                    'condition' => 'Very Good',
                    'color' => 'Modern Steel Metallic',
                    'interior_color' => 'Gray Leather',
                    'purchase_date' => Carbon::create(2020, 3, 20)->toDateString(),
                    'features' => json_encode(['Honda Sensing', 'Apple CarPlay', 'Android Auto']),
                    'image' => 'images/preowned/honda_crv_2020.jpg'
                ]
            ],
            [
                'car_model' => [
                    'brand_id' => $ford->id,
                    'range_of_cars_id' => $pickup->id,
                    'name' => 'Ranger',
                    'year' => 2022,
                    'description' => 'The Ford Ranger 2022 combines rugged capability with modern technology.',
                ],
                'preowned' => [
                    'mileage' => 18000,
                    'price' => 1080000000,
                    'condition' => 'Excellent',
                    'color' => 'Conquer Grey',
                    'interior_color' => 'Ebony with Orange Stitching',
                    'purchase_date' => Carbon::create(2022, 5, 10)->toDateString(),
                    'features' => json_encode(['SYNC 3', 'Off-road Package', 'Navigation System']),
                    'image' => 'images/preowned/ford_ranger_2022.jpg'
                ]
            ],
            [
                'car_model' => [
                    'brand_id' => $hyundai->id,
                    'range_of_cars_id' => $suv->id,
                    'name' => 'Tucson',
                    'year' => 2021,
                    'description' => 'The Hyundai Tucson 2021 features bold design and advanced safety features.',
                ],
                'preowned' => [
                    'mileage' => 33000,
                    'price' => 977500000,
                    'condition' => 'Very Good',
                    'color' => 'Amazon Gray',
                    'interior_color' => 'Gray Two-Tone Leather',
                    'purchase_date' => Carbon::create(2021, 7, 15)->toDateString(),
                    'features' => json_encode(['Smart Cruise Control', 'Bose Audio', 'Panoramic Sunroof']),
                    'image' => 'images/preowned/hyundai_tucson_2021.jpg'
                ]
            ],
            [
                'car_model' => [
                    'brand_id' => $mazda->id,
                    'range_of_cars_id' => $suv->id,
                    'name' => 'CX-5',
                    'year' => 2022,
                    'description' => 'The Mazda CX-5 2022 delivers premium feel and engaging driving dynamics.',
                ],
                'preowned' => [
                    'mileage' => 15000,
                    'price' => 990000000,
                    'condition' => 'Excellent',
                    'color' => 'Soul Red Crystal',
                    'interior_color' => 'Black Leather',
                    'purchase_date' => Carbon::create(2022, 9, 1)->toDateString(),
                    'features' => json_encode(['i-Activsense', 'Sunroof', 'Bose Premium Audio']),
                    'image' => 'images/preowned/mazda_cx5_2022.jpg'
                ]
            ],
            [
                'car_model' => [
                    'brand_id' => $kia->id,
                    'range_of_cars_id' => $suv->id,
                    'name' => 'Seltos',
                    'year' => 2021,
                    'description' => 'The Kia Seltos 2021 is a stylish compact SUV with advanced technology.',
                ],
                'preowned' => [
                    'mileage' => 28000,
                    'price' => 807500000,
                    'condition' => 'Very Good',
                    'color' => 'Starbright Yellow',
                    'interior_color' => 'Black SynTex',
                    'purchase_date' => Carbon::create(2021, 11, 20)->toDateString(),
                    'features' => json_encode(['10.25-inch Touchscreen', 'Bose Audio', 'Smart Cruise Control']),
                    'image' => 'images/preowned/kia_seltos_2021.jpg'
                ]
            ],
            [
                'car_model' => [
                    'brand_id' => $nissan->id,
                    'range_of_cars_id' => $suv->id,
                    'name' => 'Kicks',
                    'year' => 2020,
                    'description' => 'The Nissan Kicks 2020 offers urban style with practical functionality.',
                ],
                'preowned' => [
                    'mileage' => 48000,
                    'price' => 680000000,
                    'condition' => 'Good',
                    'color' => 'Gun Metallic',
                    'interior_color' => 'Charcoal Sport Cloth',
                    'purchase_date' => Carbon::create(2020, 6, 5)->toDateString(),
                    'features' => json_encode(['Bose Personal Plus Audio', 'Around View Monitor', 'Intelligent Key']),
                    'image' => 'images/preowned/nissan_kicks_2020.jpg'
                ]
            ],
            [
                'car_model' => [
                    'brand_id' => $subaru->id,
                    'range_of_cars_id' => $suv->id,
                    'name' => 'Forester',
                    'year' => 2019,
                    'description' => 'The Subaru Forester 2019 combines safety and all-weather capability.',
                ],
                'preowned' => [
                    'mileage' => 65000,
                    'price' => 1000000000,
                    'condition' => 'Good',
                    'color' => 'Jasper Green',
                    'interior_color' => 'Gray StarTex',
                    'purchase_date' => Carbon::create(2019, 8, 15)->toDateString(),
                    'features' => json_encode(['Symmetrical AWD', 'EyeSight Driver Assist', 'X-Mode']),
                    'image' => 'images/preowned/subaru_forester_2019.jpg'
                ]
            ],
            [
                'car_model' => [
                    'brand_id' => $volkswagen->id,
                    'range_of_cars_id' => $suv->id,
                    'name' => 'Tiguan',
                    'year' => 2020,
                    'description' => 'The Volkswagen Tiguan 2020 delivers German engineering and versatility.',
                ],
                'preowned' => [
                    'mileage' => 40000,
                    'price' => 1572500000,
                    'condition' => 'Very Good',
                    'color' => 'Pure White',
                    'interior_color' => 'Storm Gray Leatherette',
                    'purchase_date' => Carbon::create(2020, 10, 10)->toDateString(),
                    'features' => json_encode(['Digital Cockpit', 'Panoramic Sunroof', 'Third Row Seating']),
                    'image' => 'images/preowned/volkswagen_tiguan_2020.jpg'
                ]
            ],
            [
                'car_model' => [
                    'brand_id' => $volvo->id,
                    'range_of_cars_id' => $suv->id,
                    'name' => 'XC40',
                    'year' => 2021,
                    'description' => 'The Volvo XC40 2021 combines Scandinavian luxury with compact versatility.',
                ],
                'preowned' => [
                    'mileage' => 22000,
                    'price' => 1755000000,
                    'condition' => 'Excellent',
                    'color' => 'Glacier Silver',
                    'interior_color' => 'Charcoal Leather',
                    'purchase_date' => Carbon::create(2021, 12, 1)->toDateString(),
                    'features' => json_encode(['City Safety', 'Sensus Connect', 'Harman Kardon Audio']),
                    'image' => 'images/preowned/volvo_xc40_2021.jpg'
                ]
            ]
        ];

        $seededPreownedCount = 0;
        foreach ($preownedData as $data) {
            // Tạo hoặc lấy CarModel
            $carModel = CarModel::firstOrCreate(
                [
                    'brand_id' => $data['car_model']['brand_id'],
                    'name' => $data['car_model']['name'],
                    'year' => $data['car_model']['year']
                ],
                $data['car_model']
            );

            // Kiểm tra xem đã có Inventory cho xe cũ này chưa
            $inventory = Inventory::firstOrCreate(
                [
                    'car_model_id' => $carModel->id,
                    'is_preowned' => true,
                ],
                [
                    'status' => 'sale',
                    'quantity' => 1
                ]
            );

            // Kiểm tra xem đã có Preowned cho Inventory này chưa
            $preowned = Preowned::firstOrCreate(
                [
                    'inventory_id' => $inventory->id,
                    'mileage' => $data['preowned']['mileage'],
                    'color' => $data['preowned']['color'],
                ],
                array_merge(
                    $data['preowned'],
                    ['inventory_id' => $inventory->id]
                )
            );

            // Log thông tin
            $this->command->info("Processed preowned vehicle:");
            $this->command->info("Brand: " . $carModel->brand->name);
            $this->command->info("Model: " . $carModel->name);
            $this->command->info("Year: " . $carModel->year);
            $this->command->info("Price: " . number_format($preowned->price, 0, ',', '.') . " VND");
            $this->command->info("Status: " . ($preowned->wasRecentlyCreated ? "Newly Created" : "Already Exists"));

            $seededPreownedCount++;
        }

        $this->command->info($seededPreownedCount . ' pre-owned vehicle entries processed.');
    }
}
