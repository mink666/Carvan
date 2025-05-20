<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preowned;
use Carbon\Carbon;

class PreownedVehicleSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Starting PreownedVehicleSeeder...');

        $preownedData = [
            [
                'name' => 'Toyota Corolla Altis 2021',
                'mileage' => 45000,
                'price' => 972000000,
                'condition' => 'excellent',
                'color' => 'Silver Metallic',
                'interior_color' => 'Black Fabric',
                'purchase_date' => Carbon::create(2021, 1, 15)->toDateString(),
                'features' => json_encode(['Backup Camera', 'Bluetooth', 'Keyless Entry']),
                'image' => 'images/preowned/Altis2021.jpeg',
                'story' => 'The Toyota Corolla Altis 2021 offers a perfect blend of style, comfort, and reliability.This vehicle has been maintained by a single owner with regular service at authorized dealerships.'
            ],
            [
                'name' => 'Honda CR-V 2020',
                'mileage' => 52000,
                'price' => 1147500000,
                'condition' => 'very good',
                'color' => 'Modern Steel Metallic',
                'interior_color' => 'Gray Leather',
                'purchase_date' => Carbon::create(2020, 3, 20)->toDateString(),
                'features' => json_encode(['Honda Sensing', 'Apple CarPlay', 'Android Auto']),
                'image' => 'images/preowned/honda_crv_2020.jpg',
                'story' => 'The Honda CR-V 2020 is a versatile and reliable SUV perfect for families.Family car carefully maintained with full service history at Honda dealerships.'
            ],
            [
                'name' => 'Ford Ranger 2022',
                'mileage' => 18000,
                'price' => 1080000000,
                'condition' => 'excellent',
                'color' => 'Conquer Grey',
                'interior_color' => 'Ebony with Orange Stitching',
                'purchase_date' => Carbon::create(2022, 5, 10)->toDateString(),
                'features' => json_encode(['SYNC 3', 'Off-road Package', 'Navigation System']),
                'image' => 'images/preowned/ford_ranger_2022.jpg',
                'story' => 'The Ford Ranger 2022 combines rugged capability with modern technology.Latest model pickup truck equipped with premium options, suitable for both city and off-road use.'
            ],
            [
                'name' => 'Hyundai Tucson 2021',
                'mileage' => 33000,
                'price' => 977500000,
                'condition' => 'very good',
                'color' => 'Amazon Gray',
                'interior_color' => 'Gray Two-Tone Leather',
                'purchase_date' => Carbon::create(2021, 7, 15)->toDateString(),
                'features' => json_encode(['Smart Cruise Control', 'Bose Audio', 'Panoramic Sunroof']),
                'image' => 'images/preowned/hyundai_tucson_2021.jpg',
                'story' => 'The Hyundai Tucson 2021 features bold design and advanced safety features.Fully imported vehicle with complete options package and extended manufacturer warranty.'
            ],
            [
                'name' => 'Mazda CX-5 2022',
                'mileage' => 15000,
                'price' => 990000000,
                'condition' => 'excellent',
                'color' => 'Soul Red Crystal',
                'interior_color' => 'Black Leather',
                'purchase_date' => Carbon::create(2022, 9, 1)->toDateString(),
                'features' => json_encode(['i-Activsense', 'Sunroof', 'Bose Premium Audio']),
                'image' => 'images/preowned/mazda_cx5_2022.jpg',
                'story' => 'The Mazda CX-5 2022 delivers premium feel and engaging driving dynamics.Like-new condition with full advanced safety features package.'
            ],
            [
                'name' => 'Kia Seltos 2021',
                'mileage' => 28000,
                'price' => 807500000,
                'condition' => 'very good',
                'color' => 'Starbright Yellow',
                'interior_color' => 'Black SynTex',
                'purchase_date' => Carbon::create(2021, 11, 20)->toDateString(),
                'features' => json_encode(['10.25-inch Touchscreen', 'Bose Audio', 'Smart Cruise Control']),
                'image' => 'images/preowned/kia_seltos_2021.jpg',
                'story' => 'The Kia Seltos 2021 is a stylish compact SUV with advanced technology.Stylish crossover with excellent fuel efficiency, perfect for urban commuting.'
            ],
            [
                'name' => 'Nissan Kicks 2020',
                'mileage' => 48000,
                'price' => 680000000,
                'condition' => 'good',
                'color' => 'Gun Metallic',
                'interior_color' => 'Charcoal Sport Cloth',
                'purchase_date' => Carbon::create(2020, 6, 5)->toDateString(),
                'features' => json_encode(['Bose Personal Plus Audio', 'Around View Monitor', 'Intelligent Key']),
                'image' => 'images/preowned/nissan_kicks_2020.jpg',
                'story' => 'The Nissan Kicks 2020 offers urban style with practical functionality.Imported vehicle with modern technology features and excellent fuel efficiency.'
            ],
            [
                'name' => 'Subaru Forester 2019',
                'mileage' => 65000,
                'price' => 1000000000,
                'condition' => 'good',
                'color' => 'Jasper Green',
                'interior_color' => 'Gray StarTex',
                'purchase_date' => Carbon::create(2019, 8, 15)->toDateString(),
                'features' => json_encode(['Symmetrical AWD', 'EyeSight Driver Assist', 'X-Mode']),
                'image' => 'images/preowned/subaru_forester_2019.jpg',
                'story' => 'The Subaru Forester 2019 combines safety and all-weather capability.Versatile AWD vehicle suitable for all terrains with full safety options.'
            ],
            [
                'name' => 'Volkswagen Tiguan 2020',
                'mileage' => 40000,
                'price' => 1572500000,
                'condition' => 'very good',
                'color' => 'Pure White',
                'interior_color' => 'Storm Gray Leatherette',
                'purchase_date' => Carbon::create(2020, 10, 10)->toDateString(),
                'features' => json_encode(['Digital Cockpit', 'Panoramic Sunroof', 'Third Row Seating']),
                'image' => 'images/preowned/volkswagen_tiguan_2020.jpg',
                'story' => 'The Volkswagen Tiguan 2020 delivers German engineering and versatility.Fully imported German vehicle with spacious 7-seat configuration and modern technology.'
            ],
            [
                'name' => 'Volvo XC40 2021',
                'mileage' => 22000,
                'price' => 1755000000,
                'condition' => 'excellent',
                'color' => 'Glacier Silver',
                'interior_color' => 'Charcoal Leather',
                'purchase_date' => Carbon::create(2021, 12, 1)->toDateString(),
                'features' => json_encode(['City Safety', 'Sensus Connect', 'Harman Kardon Audio']),
                'image' => 'images/preowned/volvo_xc40_2021.jpg',
                'story' => 'The Volvo XC40 2021 combines Scandinavian luxury with compact versatility.Top safety-rated vehicle in its class with premium features and elegant Scandinavian design.'
            ]
        ];

        $seededPreownedCount = 0;
        foreach ($preownedData as $data) {
            // Create new Preowned record
            $preowned = Preowned::firstOrCreate(
                [
                    'name' => $data['name'],
                    'mileage' => $data['mileage'],
                    'color' => $data['color'],
                ],
                $data
            );

            // Log information
            $this->command->info("Processed preowned vehicle:");
            $this->command->info("Name: " . $preowned->name);
            $this->command->info("Mileage: " . number_format($preowned->mileage, 0, ',', '.') . " km");
            $this->command->info("Price: " . number_format($preowned->price, 0, ',', '.') . " VND");
            $this->command->info("Status: " . ($preowned->wasRecentlyCreated ? "Newly Created" : "Already Exists"));

            $seededPreownedCount++;
        }

        $this->command->info($seededPreownedCount . " preowned vehicles processed.");
    }
}
