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
                'image' => 'images/preowned/Altis2021.png',
                'story' => 'Experience refined elegance with this meticulously maintained 2021 Toyota Corolla Altis. This single-owner vehicle boasts a comprehensive service history exclusively at authorized Toyota dealerships. The Silver Metallic exterior paired with the Black Fabric interior creates a timeless aesthetic. With only 45,000 km on the odometer, this Altis delivers Toyota renowned reliability combined with modern features including a backup camera, Bluetooth connectivity, and keyless entry. Perfect for both daily commuting and family trips, offering excellent fuel efficiency and comfortable seating for five.',
                'is_active' => true,
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
                'image' => 'images/preowned/honda_crv_2020.png',
                'story' => 'Discover versatility and reliability with this 2020 Honda CR-V. This well-maintained SUV comes equipped with the advanced Honda Sensing safety suite, making every journey safer and more comfortable. The Modern Steel Metallic exterior complements its spacious Gray Leather interior perfectly. With 52,000 km of careful use, this CR-V features seamless smartphone integration through Apple CarPlay and Android Auto. The vehicle has been serviced regularly at authorized Honda dealerships, ensuring optimal performance and reliability. Ideal for families, offering ample cargo space and excellent fuel economy.',
                'is_active' => true,
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
                'image' => 'images/preowned/ford_ranger_2022.png',
                'story' => 'Embrace adventure with this powerful 2022 Ford Ranger. This nearly new pickup truck combines rugged capability with modern sophistication. The striking Conquer Grey exterior and premium Ebony interior with distinctive Orange Stitching set it apart. With just 18,000 km on the odometer, this Ranger features Ford\'s advanced SYNC 3 system, comprehensive off-road package, and integrated navigation. Perfect for both work and leisure, offering exceptional towing capacity and comfortable daily driving. The vehicle has been maintained to the highest standards and comes with remaining factory warranty coverage.',
                'is_active' => true,
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
                'image' => 'images/preowned/hyundai_tucson_2021.png',
                'story' => 'Step into luxury with this 2021 Hyundai Tucson. This fully-imported SUV showcases Hyundai\'s latest design language with its stunning Amazon Gray exterior and premium Gray Two-Tone Leather interior. With only 33,000 km driven, this Tucson comes loaded with features including Smart Cruise Control for effortless highway driving, premium Bose audio system for an immersive sound experience, and a panoramic sunroof for an open-air feeling. The vehicle is still covered under Hyundai\'s extended warranty program and has been serviced according to schedule.',
                'is_active' => true,
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
                'image' => 'images/preowned/mazda_cx5_2022.png',
                'story' => 'Experience premium driving pleasure with this 2022 Mazda CX-5. This near-mint condition SUV showcases Mazda\'s signature Soul Red Crystal paint and luxurious Black Leather interior. With just 15,000 km on the odometer, this CX-5 feels practically new. Equipped with Mazda\'s comprehensive i-Activsense safety suite, a power sunroof, and Bose Premium Audio system, it delivers an exceptional driving experience. The vehicle\'s responsive handling and upscale interior make it stand out in its class. All maintenance has been performed at authorized Mazda service centers, maintaining its pristine condition.',
                'is_active' => true,
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
                'image' => 'images/preowned/kia_seltos_2021.png',
                'story' => 'Stand out from the crowd with this 2021 Kia Seltos. This eye-catching compact SUV in Starbright Yellow with sophisticated Black SynTex interior offers the perfect blend of style and functionality. With only 28,000 km driven, this Seltos features a stunning 10.25-inch touchscreen display, premium Bose audio system, and Smart Cruise Control for enhanced driving comfort. Its efficient engine and compact dimensions make it perfect for urban driving, while still providing ample space for passengers and cargo. Regular maintenance at Kia service centers ensures reliable performance.',
                'is_active' => true,
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
                'image' => 'images/preowned/nissan_kicks_2020.png',
                'story' => 'Discover urban agility with this 2020 Nissan Kicks. This stylish crossover in Gun Metallic with comfortable Charcoal Sport Cloth interior is perfect for city living. With 48,000 km of careful use, this Kicks comes equipped with Nissan\'s innovative Bose Personal Plus Audio system for an immersive sound experience, Around View Monitor for easy parking, and Intelligent Key for convenience. Its compact size and excellent fuel efficiency make it ideal for daily commuting, while the flexible cargo space accommodates weekend adventures. The vehicle has been regularly maintained and offers great value in its segment.',
                'is_active' => true,
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
                'image' => 'images/preowned/subaru_forester_2019.png',
                'story' => 'Embrace all-weather confidence with this 2019 Subaru Forester. This capable SUV in distinctive Jasper Green with durable Gray StarTex interior showcases Subaru\'s legendary Symmetrical All-Wheel Drive system. Despite its 65,000 km, this Forester runs smoothly and reliably, featuring the advanced EyeSight Driver Assist Technology and X-Mode for enhanced off-road capability. Perfect for outdoor enthusiasts, it offers excellent ground clearance and robust build quality. Regular maintenance at authorized Subaru service centers ensures its mechanical integrity and reliability.',
                'is_active' => true,
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
                'image' => 'images/preowned/volkswagen_tiguan_2020.png',
                'story' => 'Experience German engineering excellence with this 2020 Volkswagen Tiguan. This sophisticated SUV in Pure White with premium Storm Gray Leatherette interior exemplifies Volkswagen\'s attention to detail. With 40,000 km of careful use, this Tiguan features the innovative Digital Cockpit, a panoramic sunroof for an airy cabin feel, and versatile third-row seating. Imported directly from Germany, it offers exceptional build quality and refined driving dynamics. The vehicle has been maintained exclusively at authorized Volkswagen service centers, ensuring optimal performance and reliability.',
                'is_active' => true,
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
                'image' => 'images/preowned/volvo_xc40_2021.png',
                'story' => 'Indulge in Scandinavian luxury with this 2021 Volvo XC40. This premium compact SUV in elegant Glacier Silver with rich Charcoal Leather interior represents the perfect blend of style and safety. With just 22,000 km on the odometer, this XC40 features Volvo\'s comprehensive City Safety system, intuitive Sensus Connect infotainment, and premium Harman Kardon audio for an exceptional driving experience. As Volvo\'s top safety-rated vehicle in its class, it offers peace of mind along with luxurious comfort. The vehicle has been meticulously maintained at authorized Volvo service centers and comes with remaining manufacturer warranty.',
                'is_active' => true,
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
