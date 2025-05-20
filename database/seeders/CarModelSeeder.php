<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarModel;
use App\Models\Brand;
use App\Models\RangeOfCar;
use App\Models\Inventory;

class CarModelSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch Brands (Giữ nguyên phần này)
        $toyota = Brand::where('name', 'Toyota')->firstOrFail();
        $honda = Brand::where('name', 'Honda')->firstOrFail();
        $ford = Brand::where('name', 'Ford')->firstOrFail();
        $hyundai = Brand::where('name', 'Hyundai')->firstOrFail();
        $mercedes = Brand::where('name', 'Mercedes-Benz')->firstOrFail();
        $bmw = Brand::where('name', 'BMW')->firstOrFail();
        $audi = Brand::where('name', 'Audi')->firstOrFail();
        $ferrari = Brand::where('name', 'Ferrari')->firstOrFail();
        $lamborghini = Brand::where('name', 'Lamborghini')->firstOrFail();
        $porsche = Brand::where('name', 'Porsche')->firstOrFail();
        $tesla = Brand::where('name', 'Tesla')->firstOrFail();
        $chevrolet = Brand::where('name', 'Chevrolet')->firstOrFail();
        $nissan = Brand::where('name', 'Nissan')->firstOrFail();
        $subaru = Brand::where('name', 'Subaru')->firstOrFail();
        $volkswagen = Brand::where('name', 'Volkswagen')->firstOrFail();
        $mazda = Brand::where('name', 'Mazda')->firstOrFail();
        $kia = Brand::where('name', 'Kia')->firstOrFail();
        $volvo = Brand::where('name', 'Volvo')->firstOrFail();

        // Fetch RangeOfCars (Giữ nguyên phần này)
        $sedan = RangeOfCar::where('name', 'Sedan')->firstOrFail();
        $suv = RangeOfCar::where('name', 'SUV (Sport Utility Vehicle)')->firstOrFail();
        $hatchback = RangeOfCar::where('name', 'Hatchback')->firstOrFail();
        $pickup = RangeOfCar::where('name', 'Pickup Truck')->firstOrFail();
        $coupe = RangeOfCar::where('name', 'Coupe')->firstOrFail();
        $convertible = RangeOfCar::where('name', 'Convertible (Cabriolet)')->firstOrFail();
        $mpv = RangeOfCar::where('name', 'MPV (Multi-Purpose Vehicle)')->firstOrFail();
        $sports = RangeOfCar::where('name', 'Sports Car')->firstOrFail();
        $ev = RangeOfCar::where('name', 'Electric Vehicle (EV)')->firstOrFail();
        $hybrid = RangeOfCar::where('name', 'Hybrid')->firstOrFail();

        $carModelsData = [
            // === TOYOTA ===
            [
                'brand_id' => $toyota->id, 'range_of_cars_id' => $sedan->id, 'name' => 'Vios', 'year' => 2025,
                'description' => 'The Toyota Vios remains a top choice for a reliable and fuel-efficient subcompact sedan, ideal for city driving and first-time car owners.',
                'image' => 'images/car_models/toyota_vios.png',
                'inventory' => ['color' => 'Alumina Jade Metallic', 'interior_color' => 'Black Fabric', 'price' => 485000000, 'features' => json_encode(['Upgraded Infotainment', 'Enhanced Safety Features', 'Improved Fuel Economy']), 'is_active' => false] // Đặt is_active = false cho inventory này
            ],
            [
                'brand_id' => $toyota->id, 'range_of_cars_id' => $sedan->id, 'name' => 'Camry', 'year' => 2025,
                'description' => 'The new Toyota Camry continues its legacy of comfort, refinement, and reliability, now with more advanced tech and hybrid options.',
                'image' => 'images/car_models/toyota_camry.png',
                'inventory' => ['color' => 'Emotional Red II', 'interior_color' => 'Macadamia Leather', 'price' => 1280000000, 'features' => json_encode(['12.3-inch Digital Display', 'Panoramic Glass Roof', 'Next-Gen Toyota Safety Sense'])]
            ],
            [
                'brand_id' => $toyota->id, 'range_of_cars_id' => $suv->id, 'name' => 'RAV4', 'year' => 2025,
                'description' => 'The Toyota RAV4 is a versatile compact SUV offering a comfortable ride, spacious interior, and available all-wheel drive. Hybrid model available.',
                'image' => 'images/car_models/toyota_rav4.png',
                'inventory' => ['color' => 'Blueprint', 'interior_color' => 'Nutmeg SofTex', 'price' => 1100000000, 'features' => json_encode(['Multi-terrain Select', 'Digital Rearview Mirror', 'Wireless Charging'])]
            ],
            [
                'brand_id' => $toyota->id, 'range_of_cars_id' => $pickup->id, 'name' => 'Hilux', 'year' => 2025,
                'description' => 'The legendary Toyota Hilux: a rugged and indestructible pickup truck built to conquer any terrain.',
                'image' => 'images/car_models/toyota_hilux.png',
                'inventory' => ['color' => 'Nebula Blue', 'interior_color' => 'Black Leather', 'price' => 900000000, 'features' => json_encode(['Heavy-Duty Suspension', 'Advanced Off-Road Tech', 'Durable Bed Liner'])]
            ],

            // === HONDA === (Giữ nguyên các mục khác, chỉ thêm inventory.is_active khi cần)
            [
                'brand_id' => $honda->id, 'range_of_cars_id' => $sedan->id, 'name' => 'City', 'year' => 2024,
                'description' => 'The Honda City is a stylish and spacious subcompact sedan known for its sporty appeal, advanced features, and refined an_array_of_interior.',
                'image' => 'images/car_models/honda_city.png',
                'inventory' => ['color' => 'Lunar Silver Metallic', 'interior_color' => 'Ivory Leather', 'price' => 565000000, 'features' => json_encode(['Honda SENSING', 'Remote Engine Start', 'LED Fog Lights'])]
            ],
            [
                'brand_id' => $honda->id, 'range_of_cars_id' => $suv->id, 'name' => 'HR-V', 'year' => 2025,
                'description' => 'The Honda HR-V is a stylish subcompact SUV that offers a versatile interior with Magic Seat® functionality and a comfortable ride.',
                'image' => 'images/car_models/honda_hrv.png',
                'inventory' => ['color' => 'Nordic Forest Pearl', 'interior_color' => 'Gray Fabric', 'price' => 750000000, 'features' => json_encode(['Real Time AWD', '7-inch Display Audio', 'Multi-Angle Rearview Camera'])]
            ],
            [
                'brand_id' => $honda->id, 'range_of_cars_id' => $hatchback->id, 'name' => 'Civic Hatchback', 'year' => 2025,
                'description' => 'The Honda Civic Hatchback combines sporty styling with versatile cargo space and an engaging driving experience.',
                'image' => 'images/car_models/honda_civic_hatchback.png',
                'inventory' => ['color' => 'Sonic Gray Pearl', 'interior_color' => 'Black/Red Suede', 'price' => 850000000, 'features' => json_encode(['Turbocharged Engine', '6-Speed Manual Option', 'Bose Premium Sound System'])]
            ],
            [
                'brand_id' => $honda->id, 'range_of_cars_id' => $mpv->id, 'name' => 'Odyssey', 'year' => 2025,
                'description' => 'The Honda Odyssey is a family-friendly minivan offering spacious seating, innovative features like Magic Slide seats, and advanced safety technologies.',
                'image' => 'images/car_models/honda_odyssey.png',
                'inventory' => ['color' => 'Obsidian Blue Pearl', 'interior_color' => 'Mocha Leather', 'price' => 1500000000, 'features' => json_encode(['CabinWatch & CabinTalk', 'Rear Entertainment System', 'HondaVAC Built-In Vacuum'])]
            ],

            // === FORD ===
            [
                'brand_id' => $ford->id, 'range_of_cars_id' => $hatchback->id, 'name' => 'Focus', 'year' => 2024,
                'description' => 'The Ford Focus offers a fun-to-drive experience with European-inspired handling and a choice of efficient engines, available as a hatchback or estate in some markets.',
                'image' => 'images/car_models/ford_focus.png',
                'inventory' => ['color' => 'Desert Island Blue', 'interior_color' => 'Ebony Cloth', 'price' => 650000000, 'features' => json_encode(['SYNC 4 Infotainment', 'Ford Co-Pilot360', 'Selectable Drive Modes'])]
            ],
            [
                'brand_id' => $ford->id, 'range_of_cars_id' => $suv->id, 'name' => 'Explorer', 'year' => 2025,
                'description' => 'The Ford Explorer is a three-row SUV offering ample space for families, powerful engine options, and advanced technology for connectivity and safety.',
                'image' => 'images/car_models/ford_explorer.png',
                'inventory' => ['color' => 'Star White Metallic', 'interior_color' => 'Sandstone Leather', 'price' => 1800000000, 'features' => json_encode(['10.1-inch Touchscreen', 'B&O Sound System', 'Intelligent 4WD', 'PowerFold 3rd Row'])]
            ],
            [
                'brand_id' => $ford->id, 'range_of_cars_id' => $pickup->id, 'name' => 'F-150', 'year' => 2025,
                'description' => 'The Ford F-150 is America\'s best-selling truck, known for its toughness, capability, and innovative features like the Pro Power Onboard generator.',
                'image' => 'images/car_models/ford_f150.png',
                'inventory' => ['color' => 'Antimatter Blue', 'interior_color' => 'Black Leather', 'price' => 2500000000, 'features' => json_encode(['PowerBoost Full Hybrid V6', 'Max Recline Seats', 'Interior Work Surface', 'Tailgate Work Surface']), 'is_active' => false] // Đặt is_active = false cho inventory này
            ],
             [
                'brand_id' => $ford->id, 'range_of_cars_id' => $sports->id, 'name' => 'Mustang', 'year' => 2025,
                'description' => 'The iconic Ford Mustang continues to deliver exhilarating performance and timeless styling, now with more technology and track-focused variants.',
                'image' => 'images/car_models/ford_mustang.png',
                'inventory' => ['color' => 'Grabber Blue', 'interior_color' => 'Showstopper Red Leather', 'price' => 2800000000, 'features' => json_encode(['5.0L V8 Engine', 'Magneride Damping System', 'Performance Package', 'Digital Instrument Cluster'])]
            ],

            // ... (Các mục dữ liệu khác giữ nguyên, chỉ thêm 'inventory' => ['is_active' => false] cho mục cần thiết) ...
            // === HYUNDAI ===
            [
                'brand_id' => $hyundai->id, 'range_of_cars_id' => $suv->id, 'name' => 'Tucson', 'year' => 2025,
                'description' => 'The Hyundai Tucson impresses with its cutting-edge design, spacious interior, and advanced safety and convenience features.',
                'image' => 'images/car_models/hyundai_tucson.png',
                'inventory' => ['color' => 'Deep Sea Blue', 'interior_color' => 'Gray Leather', 'price' => 870000000, 'features' => json_encode(['Parametric Jewel Hidden Lights', 'Remote Smart Park Assist', '10.25-inch Digital Cluster'])]
            ],
            [
                'brand_id' => $hyundai->id, 'range_of_cars_id' => $sedan->id, 'name' => 'Accent', 'year' => 2024,
                'description' => 'The Hyundai Accent is a fuel-efficient and affordable subcompact sedan, perfect for city commuting with a comfortable interior and practical features.',
                'image' => 'images/car_models/hyundai_accent.png',
                'inventory' => ['color' => 'Admiral Blue', 'interior_color' => 'Beige Cloth', 'price' => 450000000, 'features' => json_encode(['7-inch Touchscreen Audio', 'Rearview Camera', 'Automatic Headlights', 'Bluetooth Connectivity'])]
            ],
            [
                'brand_id' => $hyundai->id, 'range_of_cars_id' => $mpv->id, 'name' => 'Staria', 'year' => 2025,
                'description' => 'The Hyundai Staria is a futuristic-looking MPV offering exceptional space, comfort, and versatility for families or business use.',
                'image' => 'images/car_models/hyundai_staria.png',
                'inventory' => ['color' => 'Abyss Black Pearl', 'interior_color' => 'Brown Nappa Leather', 'price' => 1500000000, 'features' => json_encode(['Dual Sunroofs', 'Premium Relaxation Seats', 'Smart Power Sliding Doors', 'Surround View Monitor'])]
            ],
            [
                'brand_id' => $hyundai->id, 'range_of_cars_id' => $ev->id, 'name' => 'IONIQ 5', 'year' => 2025,
                'description' => 'The Hyundai IONIQ 5 is a groundbreaking electric CUV with a distinctive retro-modern design, ultra-fast charging, and a spacious, innovative interior.',
                'image' => 'images/car_models/hyundai_ioniq5.png',
                'inventory' => ['color' => 'Cyber Gray Metallic', 'interior_color' => 'Dark Pebble Gray/Dove Gray', 'price' => 1300000000, 'features' => json_encode(['Vehicle-to-Load (V2L)', 'Augmented Reality Head-Up Display', 'Relaxation Comfort Seats', '800V Charging System'])]
            ],

            // === MERCEDES-BENZ ===
            [
                'brand_id' => $mercedes->id, 'range_of_cars_id' => $sedan->id, 'name' => 'C-Class Sedan', 'year' => 2025,
                'description' => 'The Mercedes-Benz C-Class Sedan sets the standard for compact luxury with its elegant design, advanced technology, and refined performance.',
                'image' => 'images/car_models/mercedes_c_class_sedan.png',
                'inventory' => ['color' => 'Polar White', 'interior_color' => 'Macchiato Beige MB-Tex', 'price' => 2200000000, 'features' => json_encode(['MBUX with Voice Control', 'Digital Light Headlamps', 'Burmester 3D Surround Sound', 'AIRMATIC Air Suspension'])]
            ],
            [
                'brand_id' => $mercedes->id, 'range_of_cars_id' => $suv->id, 'name' => 'GLC SUV', 'year' => 2025,
                'description' => 'The Mercedes-Benz GLC SUV combines striking design with intelligent technology and versatile capability, perfect for both city and adventure.',
                'image' => 'images/car_models/mercedes_glc_suv.png',
                'inventory' => ['color' => 'Selenite Black Metallic', 'interior_color' => 'Black MB-Tex/Microfiber', 'price' => 2800000000, 'features' => json_encode(['Off-Road Engineering Package', 'Panoramic Sunroof', 'Augmented Reality Navigation', 'MBUX Interior Assistant'])]
            ],
            [
                'brand_id' => $mercedes->id, 'range_of_cars_id' => $coupe->id, 'name' => 'CLE Coupe', 'year' => 2025,
                'description' => 'The new Mercedes-Benz CLE Coupe blends expressive design with sporty performance and innovative comfort, succeeding both C-Class and E-Class coupes.',
                'image' => 'images/car_models/mercedes_cle_coupe.png',
                'inventory' => ['color' => 'MANUFAKTUR Patagonia Red', 'interior_color' => 'Neva Grey/Magma Grey Nappa', 'price' => 3500000000, 'features' => json_encode(['MBUX Superscreen', 'DYNAMIC BODY CONTROL', 'Integrated Starter-Generator', 'AMG Line Exterior/Interior'])]
            ],
             [
                'brand_id' => $mercedes->id, 'range_of_cars_id' => $convertible->id, 'name' => 'SL Roadster', 'year' => 2025,
                'description' => 'The iconic Mercedes-AMG SL Roadster returns, more luxurious and sportier than ever, with a classic soft top and available 2+2 seating.',
                'image' => 'images/car_models/mercedes_sl_roadster.png',
                'inventory' => ['color' => 'MANUFAKTUR Moonlight White Magno', 'interior_color' => 'Style Red Pepper/Black Nappa Leather', 'price' => 9000000000, 'features' => json_encode(['AMG Performance 4MATIC+', 'MBUX Hyperscreen', 'AIRSCARF neck-level heating', 'AMG Active Ride Control suspension'])]
            ],

            // === BMW ===
            [
                'brand_id' => $bmw->id, 'range_of_cars_id' => $sedan->id, 'name' => '5 Series', 'year' => 2025,
                'description' => 'The BMW 5 Series is the epitome of the business sedan, offering a perfect balance of dynamic performance, luxurious comfort, and cutting-edge technology.',
                'image' => 'images/car_models/bmw_5_series.png',
                'inventory' => ['color' => 'Phytonic Blue Metallic', 'interior_color' => 'Cognac Perforated SensaTec', 'price' => 3000000000, 'features' => json_encode(['BMW Curved Display with iDrive 8.5', 'Integral Active Steering', 'Adaptive M Suspension', 'Bowers & Wilkins Diamond Surround Sound'])]
            ],
            [
                'brand_id' => $bmw->id, 'range_of_cars_id' => $suv->id, 'name' => 'X5', 'year' => 2025,
                'description' => 'The BMW X5 Sports Activity Vehicle® offers a commanding presence, versatile utility, and signature BMW driving pleasure, with powerful engines and luxurious appointments.',
                'image' => 'images/car_models/bmw_x5.png',
                'inventory' => ['color' => 'Carbon Black Metallic', 'interior_color' => 'Tartufo Extended Merino Leather', 'price' => 4000000000, 'features' => json_encode(['xOffroad Package', 'Sky Lounge LED Roof', 'Driving Assistant Professional', 'Harman Kardon Surround Sound'])]
            ],
            [
                'brand_id' => $bmw->id, 'range_of_cars_id' => $ev->id, 'name' => 'iX', 'year' => 2025,
                'description' => 'The BMW iX is a revolutionary all-electric Sports Activity Vehicle, showcasing sustainable luxury, pioneering technology, and impressive range.',
                'image' => 'images/car_models/bmw_ix.png',
                'inventory' => ['color' => 'Storm Bay Metallic', 'interior_color' => 'Stonegray Microfiber/Wool Blend', 'price' => 4500000000, 'features' => json_encode(['BMW Curved Display', 'Panoramic Glass Roof with Shading', '5th Gen eDrive Technology', 'Shy Tech features'])]
            ],
            [
                'brand_id' => $bmw->id, 'range_of_cars_id' => $coupe->id, 'name' => 'M4 Coupe', 'year' => 2025,
                'description' => 'The BMW M4 Coupe delivers exhilarating performance and precision handling, featuring a bold design and M-specific chassis technology.',
                'image' => 'images/car_models/bmw_m4_coupe.png',
                'inventory' => ['color' => 'Isle of Man Green Metallic', 'interior_color' => 'Yas Marina Blue/Black Extended Merino Leather', 'price' => 5500000000, 'features' => json_encode(['M TwinPower Turbo inline 6-cylinder engine', 'M xDrive all-wheel drive available', 'M Carbon bucket seats', 'BMW Laserlight'])]
            ],

            // === AUDI ===
            [
                'brand_id' => $audi->id, 'range_of_cars_id' => $sedan->id, 'name' => 'A6', 'year' => 2025,
                'description' => 'The Audi A6 sedan combines elegant design with advanced technology and a luxurious, spacious interior, perfect for business and pleasure.',
                'image' => 'images/car_models/audi_a6.png',
                'inventory' => ['color' => 'Firmament Blue Metallic', 'interior_color' => 'Sard Brown Valcona Leather', 'price' => 3200000000, 'features' => json_encode(['Dual MMI touch response displays', 'Audi virtual cockpit plus', 'Bang & Olufsen 3D Premium Sound', 'HD Matrix-design LED headlights'])]
            ],
            [
                'brand_id' => $audi->id, 'range_of_cars_id' => $suv->id, 'name' => 'Q7', 'year' => 2025,
                'description' => 'The Audi Q7 is a luxurious three-row SUV offering versatile space, advanced technology, and confident performance with standard quattro® all-wheel drive.',
                'image' => 'images/car_models/audi_q7.png',
                'inventory' => ['color' => 'Galaxy Blue Metallic', 'interior_color' => 'Okapi Brown Leather', 'price' => 3800000000, 'features' => json_encode(['Adaptive Air Suspension', 'Power soft-closing doors', 'Audi phone box with wireless charging', 'Top view camera system'])]
            ],
            [
                'brand_id' => $audi->id, 'range_of_cars_id' => $sports->id, 'name' => 'RS 6 Avant', 'year' => 2025,
                'description' => 'The Audi RS 6 Avant is the ultimate high-performance wagon, combining blistering speed with everyday practicality and aggressive styling.',
                'image' => 'images/car_models/audi_rs6_avant.png',
                'inventory' => ['color' => 'Nardo Gray', 'interior_color' => 'Black Valcona Leather with Express Red stitching', 'price' => 7000000000, 'features' => json_encode(['4.0L TFSI V8 twin-turbo', 'RS sport suspension plus with Dynamic Ride Control', 'Carbon optic package', 'RS sport exhaust system'])]
            ],

            // === FERRARI ===
            [
                'brand_id' => $ferrari->id, 'range_of_cars_id' => $sports->id, 'name' => '296 GTB', 'year' => 2024,
                'description' => 'The Ferrari 296 GTB, an evolution of Ferrari’s mid-rear-engined two-seater sports berlinetta concept, represents a revolution for the Maranello-based company as it introduces the new V6 engine.',
                'image' => 'images/car_models/ferrari_296_gtb.png',
                'inventory' => ['color' => 'Rosso Corsa', 'interior_color' => 'Nero Leather with Rosso Stitching', 'price' => 25000000000, 'features' => json_encode(['V6 Hybrid Powertrain', 'Active Aerodynamics', 'eManettino Steering Wheel Controls', 'SF90 Stradale-derived technology'])]
            ],
            [
                'brand_id' => $ferrari->id, 'range_of_cars_id' => $sports->id, 'name' => 'Roma', 'year' => 2024,
                'description' => 'The Ferrari Roma, the new mid-front-engined 2+ coupé of the Prancing Horse, features timeless and subtly refined styling combined with exhilarating performance.',
                'image' => 'images/car_models/ferrari_roma.png',
                'inventory' => ['color' => 'Blu Roma', 'interior_color' => 'Cuoio Leather', 'price' => 20000000000, 'features' => json_encode(['Twin-turbo V8 Engine', 'Elegant "La Nuova Dolce Vita" design', 'Advanced Driver Assistance Systems', 'Dual Cockpit Concept'])]
            ],
            [
                'brand_id' => $ferrari->id, 'range_of_cars_id' => $suv->id, 'name' => 'Purosangue', 'year' => 2024,
                'description' => 'The Ferrari Purosangue, the first ever four-door, four-seater car in Ferrari’s history, delivers pure Ferrari performance with added versatility.',
                'image' => 'images/car_models/ferrari_purosangue.png',
                'inventory' => ['color' => 'Grigio Titanio', 'interior_color' => 'Bordeaux Leather', 'price' => 35000000000, 'features' => json_encode(['Naturally Aspirated V12 Engine', 'Ferrari Active Suspension Technology', 'Welcome Doors', 'Spacious and Luxurious Cabin'])]
            ],

            // === LAMBORGHINI ===
            [
                'brand_id' => $lamborghini->id, 'range_of_cars_id' => $sports->id, 'name' => 'Huracán Tecnica', 'year' => 2024,
                'description' => 'The Lamborghini Huracán Tecnica: the next-generation rear-wheel drive V10, developed for pilots seeking driving fun and lifestyle perfection on both road and track.',
                'image' => 'images/car_models/lamborghini_huracan_tecnica.png',
                'inventory' => ['color' => 'Verde Selvans', 'interior_color' => 'Nero Ade Alcantara with Verde Fauns Stitching', 'price' => 28000000000, 'features' => json_encode(['Naturally Aspirated V10 Engine', 'Rear-Wheel Drive with Rear-Wheel Steering', 'LDVI (Lamborghini Dinamica Veicolo Integrata)', 'Carbon Fiber Body Panels'])]
            ],
            [
                'brand_id' => $lamborghini->id, 'range_of_cars_id' => $suv->id, 'name' => 'Urus Performante', 'year' => 2024,
                'description' => 'The Lamborghini Urus Performante raises the bar for Super SUV sportiness and performance with even more power, lighter weight, and optimized aerodynamics.',
                'image' => 'images/car_models/lamborghini_urus_performante.png',
                'inventory' => ['color' => 'Giallo Inti', 'interior_color' => 'Nero Cosmus/Nero Ade Alcantara with Giallo Taurus details', 'price' => 26000000000, 'features' => json_encode(['Twin-Turbo V8 Engine', 'Akrapovič Titanium Sports Exhaust', 'Rally Mode for Dirt Tracks', 'Extensive Carbon Fiber Use'])]
            ],
            [
                'brand_id' => $lamborghini->id, 'range_of_cars_id' => $hybrid->id, 'name' => 'Revuelto', 'year' => 2024,
                'description' => 'The Lamborghini Revuelto is the first HPEV (High Performance Electrified Vehicle) plug-in hybrid super sports car, combining a new V12 engine with three electric motors.',
                'image' => 'images/car_models/lamborghini_revuelto.png',
                'inventory' => ['color' => 'Arancio Dac Lucido', 'interior_color' => 'Nero Ade with Arancio Leonis Accents', 'price' => 45000000000, 'features' => json_encode(['V12 Hybrid Powertrain (1015 CV)', '8-Speed Dual-Clutch Transmission', 'Monofuselage Carbon Fiber Chassis', 'Active Aerodynamics'])]
            ],

            // === PORSCHE ===
            [
                'brand_id' => $porsche->id, 'range_of_cars_id' => $sports->id, 'name' => '911 Carrera', 'year' => 2025,
                'description' => 'The Porsche 911 Carrera is the quintessential sports car, continuously refined over decades to deliver unparalleled driving dynamics and timeless design.',
                'image' => 'images/car_models/porsche_911_carrera.png',
                'inventory' => ['color' => 'Guards Red', 'interior_color' => 'Black Leather', 'price' => 8000000000, 'features' => json_encode(['Twin-turbo Boxer Engine', 'Porsche Doppelkupplung (PDK)', 'Porsche Active Suspension Management (PASM)', 'Porsche Communication Management (PCM)'])]
            ],
            [
                'brand_id' => $porsche->id, 'range_of_cars_id' => $suv->id, 'name' => 'Cayenne', 'year' => 2025,
                'description' => 'The Porsche Cayenne combines typical Porsche performance with excellent everyday practicality and five-seat versatility. Available in Coupe and E-Hybrid variants.',
                'image' => 'images/car_models/porsche_cayenne.png',
                'inventory' => ['color' => 'Chromite Black Metallic', 'interior_color' => 'Mojave Beige Club Leather', 'price' => 6500000000, 'features' => json_encode(['Porsche Advanced Cockpit', 'Adaptive Air Suspension', 'Rear-Axle Steering', 'Matrix LED Headlights'])]
            ],
            [
                'brand_id' => $porsche->id, 'range_of_cars_id' => $ev->id, 'name' => 'Taycan', 'year' => 2025,
                'description' => 'The Porsche Taycan is the pure expression of a Porsche electric sports car, delivering breathtaking acceleration, reproducible performance, and impressive range.',
                'image' => 'images/car_models/porsche_taycan.png',
                'inventory' => ['color' => 'Frozen Blue Metallic', 'interior_color' => 'Blackberry/Slate Grey OLEA Club Leather', 'price' => 7000000000, 'features' => json_encode(['800-Volt Architecture', 'Performance Battery Plus', 'Porsche Recuperation Management (PRM)', 'Porsche Electric Sport Sound'])]
            ],

            // === CHEVROLET ===
            [
                'brand_id' => $chevrolet->id, 'range_of_cars_id' => $suv->id, 'name' => 'Traverse', 'year' => 2025,
                'description' => 'The Chevrolet Traverse is a spacious three-row SUV, offering comfortable seating for the whole family and ample cargo space.',
                'image' => 'images/car_models/chevrolet_traverse.png',
                'inventory' => ['color' => 'Summit White', 'interior_color' => 'Jet Black Cloth', 'price' => 1400000000, 'features' => json_encode(['8-inch Touchscreen', 'Chevy Safety Assist', 'Tri-Zone Climate Control'])]
            ],
            [
                'brand_id' => $chevrolet->id, 'range_of_cars_id' => $pickup->id, 'name' => 'Silverado 1500', 'year' => 2025,
                'description' => 'The Chevrolet Silverado 1500 is a full-size pickup truck known for its powerful engine options, towing capability, and dependable performance.',
                'image' => 'images/car_models/chevrolet_silverado.png',
                'inventory' => ['color' => 'Red Hot', 'interior_color' => 'Gideon/Very Dark Atmosphere Cloth', 'price' => 1700000000, 'features' => json_encode(['Durabed Truck Bed', 'Multi-Flex Tailgate', 'Advanced Trailering System'])]
            ],
            [
                'brand_id' => $chevrolet->id, 'range_of_cars_id' => $sports->id, 'name' => 'Corvette Stingray', 'year' => 2025,
                'description' => 'The Chevrolet Corvette Stingray is an iconic American sports car, now with a mid-engine layout for unprecedented performance and handling.',
                'image' => 'images/car_models/chevrolet_corvette.png',
                'inventory' => ['color' => 'Torch Red', 'interior_color' => 'Jet Black Mulan Leather', 'price' => 5500000000, 'features' => json_encode(['6.2L V8 DI engine', 'Z51 Performance Package', 'Magnetic Ride Control'])]
            ],

            // === KIA ===
            [
                'brand_id' => $kia->id, 'range_of_cars_id' => $suv->id, 'name' => 'Sportage', 'year' => 2025,
                'description' => 'The Kia Sportage is a compact SUV that stands out with its bold design, spacious interior, and a wealth of technology features.',
                'image' => 'images/car_models/kia_sportage.png',
                'inventory' => ['color' => 'Vesta Blue', 'interior_color' => 'Black SynTex', 'price' => 950000000, 'features' => json_encode(['Dual Panoramic Displays', 'Kia Drive Wise Safety Suite', 'Available AWD'])]
            ],
            [
                'brand_id' => $kia->id, 'range_of_cars_id' => $sedan->id, 'name' => 'K5 (Optima)', 'year' => 2025,
                'description' => 'The Kia K5 (formerly Optima) is a mid-size sedan offering striking styling, a comfortable cabin, and available turbocharged performance.',
                'image' => 'images/car_models/kia_k5.png',
                'inventory' => ['color' => 'Gravity Gray', 'interior_color' => 'Red SynTex', 'price' => 1050000000, 'features' => json_encode(['10.25-inch Touchscreen', 'Wireless Charging', 'Smart Cruise Control'])]
            ],
            [
                'brand_id' => $kia->id, 'range_of_cars_id' => $ev->id, 'name' => 'EV6', 'year' => 2025,
                'description' => 'The Kia EV6 is an all-electric crossover with a futuristic design, long range, ultra-fast charging, and impressive performance.',
                'image' => 'images/car_models/kia_ev6.png',
                'inventory' => ['color' => 'Runway Red', 'interior_color' => 'Black Suede with Vegan Leather', 'price' => 1800000000, 'features' => json_encode(['Dual 12.3-inch Screens', 'Augmented Reality Head-Up Display', 'Vehicle-to-Load (V2L)'])]
            ],

            // === MAZDA ===
            [
                'brand_id' => $mazda->id, 'range_of_cars_id' => $suv->id, 'name' => 'CX-5', 'year' => 2025,
                'description' => 'The Mazda CX-5 is a compact crossover SUV that offers a premium feel, engaging driving dynamics, and elegant Kodo design.',
                'image' => 'images/car_models/mazda_cx5.png',
                'inventory' => ['color' => 'Soul Red Crystal Metallic', 'interior_color' => 'Parchment Nappa Leather', 'price' => 1020000000, 'features' => json_encode(['i-Activ AWD', 'Bose 10-speaker Audio', 'Active Driving Display'])]
            ],
            [
                'brand_id' => $mazda->id, 'range_of_cars_id' => $sedan->id, 'name' => 'Mazda3 Sedan', 'year' => 2025,
                'description' => 'The Mazda3 Sedan elevates the compact car segment with its sophisticated styling, upscale interior, and refined driving experience.',
                'image' => 'images/car_models/mazda_mazda3_sedan.png',
                'inventory' => ['color' => 'Machine Gray Metallic', 'interior_color' => 'Red Leather', 'price' => 800000000, 'features' => json_encode(['Skyactiv-G Engine', 'Mazda Connect Infotainment', 'i-Activsense Safety Features'])]
            ],
            [
                'brand_id' => $mazda->id, 'range_of_cars_id' => $sports->id, 'name' => 'MX-5 Miata', 'year' => 2025,
                'description' => 'The Mazda MX-5 Miata is the iconic lightweight sports car, delivering pure driving joy with its perfect balance and agile handling.',
                'image' => 'images/car_models/mazda_mx5.png',
                'inventory' => ['color' => 'Jet Black Mica', 'interior_color' => 'Black Cloth with Red Stitching', 'price' => 1300000000, 'features' => json_encode(['Retractable Fastback or Soft Top', 'Skyactiv-G 2.0L Engine', 'Kinematic Posture Control'])]
            ],

            // === NISSAN ===
            [
                'brand_id' => $nissan->id, 'range_of_cars_id' => $suv->id, 'name' => 'Rogue (X-Trail)', 'year' => 2025,
                'description' => 'The Nissan Rogue (known as X-Trail in many markets) is a family-friendly compact SUV with a comfortable interior, advanced safety tech, and available AWD.',
                'image' => 'images/car_models/nissan_rogue.png',
                'inventory' => ['color' => 'Boulder Gray Pearl', 'interior_color' => 'Charcoal Quilted Semi-aniline Leather', 'price' => 980000000, 'features' => json_encode(['ProPILOT Assist', 'Dual Panel Panoramic Moonroof', 'Motion Activated Liftgate'])]
            ],
            [
                'brand_id' => $nissan->id, 'range_of_cars_id' => $sedan->id, 'name' => 'Altima', 'year' => 2025,
                'description' => 'The Nissan Altima is a mid-size sedan that offers a stylish design, a comfortable ride, and available Intelligent All-Wheel Drive.',
                'image' => 'images/car_models/nissan_altima.png',
                'inventory' => ['color' => 'Scarlet Ember Tintcoat', 'interior_color' => 'Gray Leather', 'price' => 900000000, 'features' => json_encode(['VC-Turbo Engine option', 'Nissan Safety Shield 360', 'Wireless Apple CarPlay'])]
            ],
            [
                'brand_id' => $nissan->id, 'range_of_cars_id' => $ev->id, 'name' => 'Ariya', 'year' => 2025,
                'description' => 'The Nissan Ariya is an all-electric crossover SUV featuring a sleek design, a lounge-like interior, and Nissan\'s latest EV technology.',
                'image' => 'images/car_models/nissan_ariya.png',
                'inventory' => ['color' => 'Northern Lights Metallic', 'interior_color' => 'Blue Gray Leatherette', 'price' => 1600000000, 'features' => json_encode(['e-4ORCE All-Wheel Drive', 'ProPILOT Assist 2.0', 'Dual 12.3-inch Displays'])]
            ],

            // === SUBARU ===
            [
                'brand_id' => $subaru->id, 'range_of_cars_id' => $suv->id, 'name' => 'Outback', 'year' => 2025,
                'description' => 'The Subaru Outback is a rugged and versatile wagon/SUV known for its standard Symmetrical All-Wheel Drive and go-anywhere capability.',
                'image' => 'images/car_models/subaru_outback.png',
                'inventory' => ['color' => 'Autumn Green Metallic', 'interior_color' => 'Java Brown Nappa Leather', 'price' => 1350000000, 'features' => json_encode(['EyeSight Driver Assist Technology', 'STARLINK Multimedia', 'Wilderness trim available'])]
            ],
            [
                'brand_id' => $subaru->id, 'range_of_cars_id' => $suv->id, 'name' => 'Forester', 'year' => 2025,
                'description' => 'The Subaru Forester is a compact SUV that delivers standard all-wheel drive, spaciousness, and renowned safety features.',
                'image' => 'images/car_models/subaru_forester.png',
                'inventory' => ['color' => 'Horizon Blue Pearl', 'interior_color' => 'Gray StarTex Water-Repellent', 'price' => 1150000000, 'features' => json_encode(['Symmetrical AWD', 'X-MODE with Hill Descent Control', 'Panoramic Power Moonroof'])]
            ],
            [
                'brand_id' => $subaru->id, 'range_of_cars_id' => $sports->id, 'name' => 'WRX', 'year' => 2025,
                'description' => 'The Subaru WRX is a rally-bred all-wheel-drive sport sedan, offering thrilling performance and agile handling for driving enthusiasts.',
                'image' => 'images/car_models/subaru_wrx.png',
                'inventory' => ['color' => 'WR Blue Pearl', 'interior_color' => 'Black Ultrasuede with Red Stitching', 'price' => 1500000000, 'features' => json_encode(['Turbocharged BOXER Engine', 'Symmetrical AWD', 'Performance-Tuned Suspension', 'Available STI variant'])]
            ],

            // === TESLA ===
            [
                'brand_id' => $tesla->id, 'range_of_cars_id' => $ev->id, 'name' => 'Model 3', 'year' => 2025,
                'description' => 'The Tesla Model 3 is a best-selling electric sedan that offers long range, quick acceleration, and access to Tesla\'s Supercharger network.',
                'image' => 'images/car_models/tesla_model_3.png',
                'inventory' => ['color' => 'Pearl White Multi-Coat', 'interior_color' => 'All Black Premium', 'price' => 1700000000, 'features' => json_encode(['Autopilot', '15-inch Touchscreen', 'Glass Roof', 'Over-the-air software updates'])]
            ],
            [
                'brand_id' => $tesla->id, 'range_of_cars_id' => $ev->id, 'name' => 'Model Y', 'year' => 2025,
                'description' => 'The Tesla Model Y is a compact electric SUV offering versatile space, impressive range, and Tesla\'s signature performance and technology.',
                'image' => 'images/car_models/tesla_model_y.png',
                'inventory' => ['color' => 'Midnight Silver Metallic', 'interior_color' => 'Black and White Premium', 'price' => 1900000000, 'features' => json_encode(['Optional Seven Seat Interior', 'HEPA Air Filtration System', 'All-Wheel Drive Dual Motor'])]
            ],
            [
                'brand_id' => $tesla->id, 'range_of_cars_id' => $ev->id, 'name' => 'Model S', 'year' => 2025,
                'description' => 'The Tesla Model S is a premium electric sedan that redefined the segment with its long range, blistering acceleration (Plaid), and advanced Autopilot features.',
                'image' => 'images/car_models/tesla_model_s.png',
                'inventory' => ['color' => 'Solid Black', 'interior_color' => 'Cream Premium with Walnut Décor', 'price' => 3500000000, 'features' => json_encode(['Plaid performance option', 'Yoke Steering (optional)', '17-inch Cinematic Display', 'Active Road Noise Reduction'])]
            ],

            // === VOLKSWAGEN ===
            [
                'brand_id' => $volkswagen->id, 'range_of_cars_id' => $hatchback->id, 'name' => 'Golf GTI', 'year' => 2025,
                'description' => 'The Volkswagen Golf GTI is the iconic hot hatchback, delivering a perfect blend of performance, practicality, and everyday usability.',
                'image' => 'images/car_models/vw_golf_gti.png',
                'inventory' => ['color' => 'Kings Red Metallic', 'interior_color' => 'Scale paper Plaid Cloth', 'price' => 1600000000, 'features' => json_encode(['2.0L TSI Engine', 'Dynamic Chassis Control', 'Digital Cockpit Pro', 'IQ.DRIVE safety suite'])]
            ],
            [
                'brand_id' => $volkswagen->id, 'range_of_cars_id' => $suv->id, 'name' => 'Tiguan', 'year' => 2025,
                'description' => 'The Volkswagen Tiguan is a stylish and versatile compact SUV, offering a comfortable interior, available third-row seating, and advanced driver-assistance features.',
                'image' => 'images/car_models/vw_tiguan.png',
                'inventory' => ['color' => 'Atlantic Blue Metallic', 'interior_color' => 'Titan Black V-Tex Leatherette', 'price' => 1300000000, 'features' => json_encode(['4MOTION All-Wheel Drive', 'Panoramic Sunroof', 'Wireless App-Connect', 'Travel Assist'])]
            ],
            [
                'brand_id' => $volkswagen->id, 'range_of_cars_id' => $ev->id, 'name' => 'ID.4', 'year' => 2025,
                'description' => 'The Volkswagen ID.4 is an all-electric SUV that combines spaciousness, long-range capability, and intuitive technology for modern electric mobility.',
                'image' => 'images/car_models/vw_id4.png',
                'inventory' => ['color' => 'Moonstone Grey', 'interior_color' => 'Galaxy Black/Lunar Grey V-Tex', 'price' => 1750000000, 'features' => json_encode(['Available AWD', 'ID. Light intuitive communication', 'Glass Roof with Electric Sunshade', 'IQ.DRIVE with Park Assist Plus'])]
            ],

            // === VOLVO ===
            [
                'brand_id' => $volvo->id, 'range_of_cars_id' => $suv->id, 'name' => 'XC60', 'year' => 2025,
                'description' => 'The Volvo XC60 is a mid-size luxury SUV that embodies Scandinavian design, advanced safety features, and efficient powertrain options, including plug-in hybrids.',
                'image' => 'images/car_models/volvo_xc60.png',
                'inventory' => ['color' => 'Crystal White Metallic', 'interior_color' => 'Blonde Nappa Leather', 'price' => 2800000000, 'features' => json_encode(['Google built-in infotainment', 'Air Purifier', 'Bowers & Wilkins High Fidelity Audio', 'Pilot Assist'])]
            ],
            [ // Duplicate Volvo S90 entry, I will assume this is for a different inventory item (e.g. different color/price if intended)
                'brand_id' => $volvo->id, 'range_of_cars_id' => $sedan->id, 'name' => 'S90', 'year' => 2025,
                'description' => 'The Volvo S90 is a luxurious executive sedan, offering sophisticated styling, a serene cabin environment, and Volvo\'s renowned commitment to safety.',
                'image' => 'images/car_models/volvo_s90.png',
                'inventory' => ['color' => 'Denim Blue Metallic', 'interior_color' => 'Amber Nappa Leather', 'price' => 3200000000, 'features' => json_encode(['Google Assistant', 'Advanced Air Cleaner', 'Graphical Head-Up Display', 'Pilot Assist with Adaptive Cruise Control'])]
            ],
            [
                'brand_id' => $volvo->id, 'range_of_cars_id' => $sedan->id, 'name' => 'S90', 'year' => 2025, // This is the second S90
                'description' => 'The Volvo S90 is a luxurious executive sedan, offering sophisticated styling, a serene cabin environment, and Volvo\'s renowned commitment to safety.', // Description is the same, but inventory differs
                'image' => 'images/car_models/volvo_s90.png', // Image is the same
                'inventory' => ['color' => 'Onyx Black Metallic', 'interior_color' => 'Charcoal Nappa Leather', 'price' => 3250000000, 'features' => json_encode(['Google Assistant', 'Advanced Air Cleaner', 'Graphical Head-Up Display', 'Pilot Assist with Adaptive Cruise Control'])]
            ],
            [
                'brand_id' => $volvo->id, 'range_of_cars_id' => $ev->id, 'name' => 'EX30', 'year' => 2025,
                'description' => 'The Volvo EX30 is a small, all-electric SUV designed to have the smallest CO2 footprint of any Volvo car to date, packed with smart tech and sustainable materials.',
                'image' => 'images/car_models/volvo_ex30.png',
                'inventory' => ['color' => 'Moss Yellow', 'interior_color' => 'Indigo (Recycled & Renewable Materials)', 'price' => 1500000000, 'features' => json_encode(['Single 12.3-inch Center Display', 'Next-gen Infotainment', 'Park Pilot Assist', 'Sustainable Interior Materials']), 'is_active' => false] // Đặt is_active = false cho inventory này
            ],
        ];

        foreach ($carModelsData as $carModelData) {
            $inventorySpecificData = $carModelData['inventory'] ?? null;
            unset($carModelData['inventory']);

            // Sử dụng updateOrCreate cho CarModel
            $carModel = CarModel::updateOrCreate(
                [
                    'brand_id' => $carModelData['brand_id'],
                    'name'     => $carModelData['name'],
                    'year'     => $carModelData['year']
                ],
                $carModelData // Dữ liệu để tạo hoặc cập nhật CarModel
            );

            if ($carModel && $inventorySpecificData) {
                $inventorySpecificData['car_model_id'] = $carModel->id;
                // Mặc định is_active cho inventory là true, trừ khi được đặt cụ thể trong $carModelsData
                $inventorySpecificData['is_active'] = $inventorySpecificData['is_active'] ?? true;
                // Mặc định is_preowned cho inventory là false
                $inventorySpecificData['is_preowned'] = $inventorySpecificData['is_preowned'] ?? false;
                // Các trường mặc định khác cho inventory nếu cần
                $inventorySpecificData['status'] = $inventorySpecificData['status'] ?? 'sale';
                $inventorySpecificData['quantity'] = $inventorySpecificData['quantity'] ?? rand(5, 20);

                Inventory::updateOrCreate(
                    [
                        'car_model_id' => $carModel->id,
                        'color'        => $inventorySpecificData['color'],
                        'is_preowned'  => $inventorySpecificData['is_preowned'] // Sử dụng giá trị đã được xử lý
                    ],
                    $inventorySpecificData // Dữ liệu để tạo hoặc cập nhật Inventory
                );
            }
        }
    }
}
