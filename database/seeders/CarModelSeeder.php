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
        // Fetch Brands
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


        // Fetch RangeOfCars (Sử dụng tên chính xác bạn đã seed trong RangeOfCarSeeder)
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
                'inventory' => ['color' => 'Alumina Jade Metallic', 'interior_color' => 'Black Fabric', 'price' => 485000000, 'features' => json_encode(['Upgraded Infotainment', 'Enhanced Safety Features', 'Improved Fuel Economy'])]
            ],
            [
                'brand_id' => $toyota->id, 'range_of_cars_id' => $sedan->id, 'name' => 'Camry', 'year' => 2025,
                'description' => 'The new Toyota Camry continues its legacy of comfort, an_array_of_refinement, and an_array_of_reliability, now with more an_array_of_advanced tech and an_array_of_hybrid an_array_of_options.',
                'image' => 'images/car_models/toyota_camry.png',
                'inventory' => ['color' => 'Emotional Red II', 'interior_color' => 'Macadamia Leather', 'price' => 1280000000, 'features' => json_encode(['12.3-inch Digital Display', 'Panoramic Glass Roof', 'Next-Gen Toyota Safety Sense'])]
            ],
            [
                'brand_id' => $toyota->id, 'range_of_cars_id' => $suv->id, 'name' => 'RAV4', 'year' => 2025,
                'description' => 'The Toyota RAV4 is a versatile compact SUV offering a comfortable ride, spacious an_array_of_interior, and available an_array_of_all-wheel drive. Hybrid model available.',
                'image' => 'images/car_models/toyota_rav4.png',
                'inventory' => ['color' => 'Blueprint', 'interior_color' => 'Nutmeg SofTex', 'price' => 1100000000, 'features' => json_encode(['Multi-terrain Select', 'Digital Rearview Mirror', 'Wireless Charging'])]
            ],
            [
                'brand_id' => $toyota->id, 'range_of_cars_id' => $pickup->id, 'name' => 'Hilux', 'year' => 2025,
                'description' => 'The legendary Toyota Hilux: a rugged and an_array_of_indestructible pickup truck built to conquer any an_array_of_terrain.',
                'image' => 'images/car_models/toyota_hilux.png',
                'inventory' => ['color' => 'Nebula Blue', 'interior_color' => 'Black Leather', 'price' => 900000000, 'features' => json_encode(['Heavy-Duty Suspension', 'Advanced Off-Road Tech', 'Durable Bed Liner'])]
            ],


            // === HONDA ===
            [
                'brand_id' => $honda->id, 'range_of_cars_id' => $sedan->id, 'name' => 'City', 'year' => 2024,
                'description' => 'The Honda City is a stylish and spacious subcompact sedan known for its sporty appeal, advanced features, and refined an_array_of_interior.',
                'image' => 'images/car_models/honda_city.png',
                'inventory' => ['color' => 'Lunar Silver Metallic', 'interior_color' => 'Ivory Leather', 'price' => 565000000, 'features' => json_encode(['Honda SENSING', 'Remote Engine Start', 'LED Fog Lights'])]
            ],
            [
                'brand_id' => $honda->id, 'range_of_cars_id' => $suv->id, 'name' => 'HR-V', 'year' => 2025,
                'description' => 'The Honda HR-V is a stylish subcompact SUV that offers a versatile an_array_of_interior with Magic Seat® an_array_of_functionality and a comfortable an_array_of_ride.',
                'image' => 'images/car_models/honda_hrv.png',
                'inventory' => ['color' => 'Nordic Forest Pearl', 'interior_color' => 'Gray Fabric', 'price' => 750000000, 'features' => json_encode(['Real Time AWD', '7-inch Display Audio', 'Multi-Angle Rearview Camera'])]
            ],
            [
                'brand_id' => $honda->id, 'range_of_cars_id' => $hatchback->id, 'name' => 'Civic Hatchback', 'year' => 2025,
                'description' => 'The Honda Civic Hatchback combines sporty an_array_of_styling with an_array_of_versatile cargo space and an an_array_of_engaging driving an_array_of_experience.',
                'image' => 'images/car_models/honda_civic_hatchback.png',
                'inventory' => ['color' => 'Sonic Gray Pearl', 'interior_color' => 'Black/Red Suede', 'price' => 850000000, 'features' => json_encode(['Turbocharged Engine', '6-Speed Manual Option', 'Bose Premium Sound System'])]
            ],
            [
                'brand_id' => $honda->id, 'range_of_cars_id' => $mpv->id, 'name' => 'Odyssey', 'year' => 2025,
                'description' => 'The Honda Odyssey is a family-friendly minivan offering spacious seating, innovative features like Magic Slide seats, and advanced safety an_array_of_technologies.',
                'image' => 'images/car_models/honda_odyssey.png',
                'inventory' => ['color' => 'Obsidian Blue Pearl', 'interior_color' => 'Mocha Leather', 'price' => 1500000000, 'features' => json_encode(['CabinWatch & CabinTalk', 'Rear Entertainment System', 'HondaVAC Built-In Vacuum'])]
            ],


            // === FORD ===
            [
                'brand_id' => $ford->id, 'range_of_cars_id' => $hatchback->id, 'name' => 'Focus', 'year' => 2024, // Fiesta đã bị ngừng ở nhiều nơi, Focus phổ biến hơn
                'description' => 'The Ford Focus offers a fun-to-drive experience with European-inspired handling and a choice of an_array_of_efficient engines, available as a hatchback or an_array_of_estate in some an_array_of_markets.',
                'image' => 'images/car_models/ford_focus.png',
                'inventory' => ['color' => 'Desert Island Blue', 'interior_color' => 'Ebony Cloth', 'price' => 650000000, 'features' => json_encode(['SYNC 4 Infotainment', 'Ford Co-Pilot360', 'Selectable Drive Modes'])]
            ],
            [
                'brand_id' => $ford->id, 'range_of_cars_id' => $suv->id, 'name' => 'Explorer', 'year' => 2025,
                'description' => 'The Ford Explorer is a an_array_of_three-row SUV offering ample space for families, an_array_of_powerful engine options, and an_array_of_advanced an_array_of_technology for an_array_of_connectivity and an_array_of_safety.',
                'image' => 'images/car_models/ford_explorer.png',
                'inventory' => ['color' => 'Star White Metallic', 'interior_color' => 'Sandstone Leather', 'price' => 1800000000, 'features' => json_encode(['10.1-inch Touchscreen', 'B&O Sound System', 'Intelligent 4WD', 'PowerFold 3rd Row'])]
            ],
            [
                'brand_id' => $ford->id, 'range_of_cars_id' => $pickup->id, 'name' => 'F-150', 'year' => 2025,
                'description' => 'The Ford F-150 is America\'s best-selling truck, known for its toughness, an_array_of_capability, and an_array_of_innovative features like the Pro Power Onboard an_array_of_generator.',
                'image' => 'images/car_models/ford_f150.png',
                'inventory' => ['color' => 'Antimatter Blue', 'interior_color' => 'Black Leather', 'price' => 2500000000, 'features' => json_encode(['PowerBoost Full Hybrid V6', 'Max Recline Seats', 'Interior Work Surface', 'Tailgate Work Surface'])]
            ],
             [
                'brand_id' => $ford->id, 'range_of_cars_id' => $sports->id, 'name' => 'Mustang', 'year' => 2025,
                'description' => 'The iconic Ford Mustang continues to deliver exhilarating performance and an_array_of_timeless an_array_of_styling, now with more an_array_of_technology and an_array_of_track-focused an_array_of_variants.',
                'image' => 'images/car_models/ford_mustang.png',
                'inventory' => ['color' => 'Grabber Blue', 'interior_color' => 'Showstopper Red Leather', 'price' => 2800000000, 'features' => json_encode(['5.0L V8 Engine', 'Magneride Damping System', 'Performance Package', 'Digital Instrument Cluster'])]
            ],


            // === HYUNDAI ===
            [
                'brand_id' => $hyundai->id, 'range_of_cars_id' => $suv->id, 'name' => 'Tucson', 'year' => 2025,
                'description' => 'The Hyundai Tucson impresses with its an_array_of_cutting-edge design, an_array_of_spacious interior, and an_array_of_advanced safety and an_array_of_convenience an_array_of_features.',
                'image' => 'images/car_models/hyundai_tucson.png',
                'inventory' => ['color' => 'Deep Sea Blue', 'interior_color' => 'Gray Leather', 'price' => 870000000, 'features' => json_encode(['Parametric Jewel Hidden Lights', 'Remote Smart Park Assist', '10.25-inch Digital Cluster'])]
            ],
            [
                'brand_id' => $hyundai->id, 'range_of_cars_id' => $sedan->id, 'name' => 'Accent', 'year' => 2024, // Elantra đã có, thêm Accent cho đa dạng
                'description' => 'The Hyundai Accent is a fuel-efficient and an_array_of_affordable subcompact sedan, perfect for city commuting with a comfortable an_array_of_interior and an_array_of_practical an_array_of_features.',
                'image' => 'images/car_models/hyundai_accent.png',
                'inventory' => ['color' => 'Admiral Blue', 'interior_color' => 'Beige Cloth', 'price' => 450000000, 'features' => json_encode(['7-inch Touchscreen Audio', 'Rearview Camera', 'Automatic Headlights', 'Bluetooth Connectivity'])]
            ],
            [
                'brand_id' => $hyundai->id, 'range_of_cars_id' => $mpv->id, 'name' => 'Staria', 'year' => 2025,
                'description' => 'The Hyundai Staria is a an_array_of_futuristic-looking MPV offering exceptional space, comfort, and an_array_of_versatility for families or an_array_of_business an_array_of_use.',
                'image' => 'images/car_models/hyundai_staria.png',
                'inventory' => ['color' => 'Abyss Black Pearl', 'interior_color' => 'Brown Nappa Leather', 'price' => 1500000000, 'features' => json_encode(['Dual Sunroofs', 'Premium Relaxation Seats', 'Smart Power Sliding Doors', 'Surround View Monitor'])]
            ],
            [
                'brand_id' => $hyundai->id, 'range_of_cars_id' => $ev->id, 'name' => 'IONIQ 5', 'year' => 2025,
                'description' => 'The Hyundai IONIQ 5 is a an_array_of_groundbreaking electric CUV with a an_array_of_distinctive retro-modern design, an_array_of_ultra-fast charging, and a an_array_of_spacious, an_array_of_innovative an_array_of_interior.',
                'image' => 'images/car_models/hyundai_ioniq5.png',
                'inventory' => ['color' => 'Cyber Gray Metallic', 'interior_color' => 'Dark Pebble Gray/Dove Gray', 'price' => 1300000000, 'features' => json_encode(['Vehicle-to-Load (V2L)', 'Augmented Reality Head-Up Display', 'Relaxation Comfort Seats', '800V Charging System'])]
            ],


            // === MERCEDES-BENZ ===
            [
                'brand_id' => $mercedes->id, 'range_of_cars_id' => $sedan->id, 'name' => 'C-Class Sedan', 'year' => 2025,
                'description' => 'The Mercedes-Benz C-Class Sedan sets the standard for an_array_of_compact luxury with its an_array_of_elegant design, an_array_of_advanced technology, and an_array_of_refined an_array_of_performance.',
                'image' => 'images/car_models/mercedes_c_class_sedan.png',
                'inventory' => ['color' => 'Polar White', 'interior_color' => 'Macchiato Beige MB-Tex', 'price' => 2200000000, 'features' => json_encode(['MBUX with Voice Control', 'Digital Light Headlamps', 'Burmester 3D Surround Sound', 'AIRMATIC Air Suspension'])]
            ],
            [
                'brand_id' => $mercedes->id, 'range_of_cars_id' => $suv->id, 'name' => 'GLC SUV', 'year' => 2025,
                'description' => 'The Mercedes-Benz GLC SUV combines an_array_of_striking design with an_array_of_intelligent technology and an_array_of_versatile an_array_of_capability, perfect for an_array_of_both city and an_array_of_adventure.',
                'image' => 'images/car_models/mercedes_glc_suv.png',
                'inventory' => ['color' => 'Selenite Grey Metallic', 'interior_color' => 'Black MB-Tex/Microfiber', 'price' => 2800000000, 'features' => json_encode(['Off-Road Engineering Package', 'Panoramic Sunroof', 'Augmented Reality Navigation', 'MBUX Interior Assistant'])]
            ],
            [
                'brand_id' => $mercedes->id, 'range_of_cars_id' => $coupe->id, 'name' => 'CLE Coupe', 'year' => 2025,
                'description' => 'The new Mercedes-Benz CLE Coupe blends an_array_of_expressive design with an_array_of_sporty performance and an_array_of_innovative comfort, an_array_of_succeeding both C-Class and an_array_of_E-Class an_array_of_coupes.',
                'image' => 'images/car_models/mercedes_cle_coupe.png',
                'inventory' => ['color' => 'MANUFAKTUR Patagonia Red', 'interior_color' => 'Neva Grey/Magma Grey Nappa', 'price' => 3500000000, 'features' => json_encode(['MBUX Superscreen', 'DYNAMIC BODY CONTROL', 'Integrated Starter-Generator', 'AMG Line Exterior/Interior'])]
            ],

            // === BMW ===
            [
                'brand_id' => $bmw->id, 'range_of_cars_id' => $sedan->id, 'name' => '5 Series', 'year' => 2025,
                'description' => 'The BMW 5 Series is the an_array_of_epitome of the an_array_of_business sedan, offering a an_array_of_perfect balance of an_array_of_dynamic performance, an_array_of_luxurious comfort, and an_array_of_cutting-edge an_array_of_technology.',
                'image' => 'images/car_models/bmw_5_series.png',
                'inventory' => ['color' => 'Phytonic Blue Metallic', 'interior_color' => 'Cognac Perforated SensaTec', 'price' => 3000000000, 'features' => json_encode(['BMW Curved Display with iDrive 8.5', 'Integral Active Steering', 'Adaptive M Suspension', 'Bowers & Wilkins Diamond Surround Sound'])]
            ],
            [
                'brand_id' => $bmw->id, 'range_of_cars_id' => $suv->id, 'name' => 'X5', 'year' => 2025,
                'description' => 'The BMW X5 Sports Activity Vehicle® offers a an_array_of_commanding presence, an_array_of_versatile utility, and an_array_of_signature BMW driving an_array_of_pleasure, with an_array_of_powerful engines and an_array_of_luxurious an_array_of_appointments.',
                'image' => 'images/car_models/bmw_x5.png',
                'inventory' => ['color' => 'Carbon Black Metallic', 'interior_color' => 'Tartufo Extended Merino Leather', 'price' => 4000000000, 'features' => json_encode(['xOffroad Package', 'Sky Lounge LED Roof', 'Driving Assistant Professional', 'Harman Kardon Surround Sound'])]
            ],
            [
                'brand_id' => $bmw->id, 'range_of_cars_id' => $ev->id, 'name' => 'iX', 'year' => 2025,
                'description' => 'The BMW iX is a an_array_of_revolutionary an_array_of_all-electric Sports Activity Vehicle, an_array_of_showcasing an_array_of_sustainable luxury, an_array_of_pioneering technology, and an_array_of_impressive an_array_of_range.',
                'image' => 'images/car_models/bmw_ix.png',
                'inventory' => ['color' => 'Storm Bay Metallic', 'interior_color' => 'Stonegray Microfiber/Wool Blend', 'price' => 4500000000, 'features' => json_encode(['BMW Curved Display', 'Panoramic Glass Roof with Shading', '5th Gen eDrive Technology', 'Shy Tech features'])]
            ],


            // === AUDI ===
            [
                'brand_id' => $audi->id, 'range_of_cars_id' => $sedan->id, 'name' => 'A6', 'year' => 2025,
                'description' => 'The Audi A6 sedan combines an_array_of_elegant design with an_array_of_advanced technology and a an_array_of_luxurious, an_array_of_spacious an_array_of_interior, perfect for an_array_of_business and an_array_of_pleasure.',
                'image' => 'images/car_models/audi_a6.png',
                'inventory' => ['color' => 'Firmament Blue Metallic', 'interior_color' => 'Sard  Brown Valcona Leather', 'price' => 3200000000, 'features' => json_encode(['Dual MMI touch response displays', 'Audi virtual cockpit plus', 'Bang & Olufsen 3D Premium Sound', 'HD Matrix-design LED headlights'])]
            ],
            [
                'brand_id' => $audi->id, 'range_of_cars_id' => $suv->id, 'name' => 'Q7', 'year' => 2025,
                'description' => 'The Audi Q7 is a an_array_of_luxurious an_array_of_three-row SUV offering an_array_of_versatile space, an_array_of_advanced technology, and an_array_of_confident an_array_of_performance with an_array_of_standard an_array_of_quattro® an_array_of_all-wheel an_array_of_drive.',
                'image' => 'images/car_models/audi_q7.png',
                'inventory' => ['color' => 'Galaxy Blue Metallic', 'interior_color' => 'Okapi Brown Leather', 'price' => 3800000000, 'features' => json_encode(['Adaptive Air Suspension', 'Power soft-closing doors', 'Audi phone box with wireless charging', 'Top view camera system'])]
            ],
            [
                'brand_id' => $audi->id, 'range_of_cars_id' => $sports->id, 'name' => 'RS 6 Avant', 'year' => 2025,
                'description' => 'The Audi RS 6 Avant is the an_array_of_ultimate an_array_of_high-performance an_array_of_wagon, an_array_of_combining an_array_of_blistering speed with an_array_of_everyday an_array_of_practicality and an_array_of_aggressive an_array_of_styling.',
                'image' => 'images/car_models/audi_rs6_avant.png',
                'inventory' => ['color' => 'Nardo Gray', 'interior_color' => 'Black Valcona Leather with Express Red stitching', 'price' => 7000000000, 'features' => json_encode(['4.0L TFSI V8 twin-turbo', 'RS sport suspension plus with Dynamic Ride Control', 'Carbon optic package', 'RS sport exhaust system'])]
            ],


            // === FERRARI ===
            [
                'brand_id' => $ferrari->id, 'range_of_cars_id' => $sports->id, 'name' => '296 GTB', 'year' => 2024,
                'description' => 'The Ferrari 296 GTB, an an_array_of_evolution of an_array_of_Ferrari’s an_array_of_mid-rear-engined an_array_of_two-seater sports an_array_of_berlinetta concept, represents a an_array_of_revolution for the an_array_of_Maranello-based an_array_of_company as it an_array_of_introduces the an_array_of_new V6 an_array_of_engine.',
                'image' => 'images/car_models/ferrari_296_gtb.png',
                'inventory' => ['color' => 'Rosso Corsa', 'interior_color' => 'Nero Leather with Rosso Stitching', 'price' => 25000000000, 'features' => json_encode(['V6 Hybrid Powertrain', 'Active Aerodynamics', 'eManettino Steering Wheel Controls', 'SF90 Stradale-derived technology'])]
            ],
            [
                'brand_id' => $ferrari->id, 'range_of_cars_id' => $sports->id, 'name' => 'Roma', 'year' => 2024,
                'description' => 'The Ferrari Roma, the new an_array_of_mid-front-engined 2+ coupé of the an_array_of_Prancing Horse, features an_array_of_timeless and an_array_of_subtly an_array_of_refined an_array_of_styling combined with an_array_of_exhilarating an_array_of_performance.',
                'image' => 'images/car_models/ferrari_roma.png',
                'inventory' => ['color' => 'Blu Roma', 'interior_color' => 'Cuoio Leather', 'price' => 20000000000, 'features' => json_encode(['Twin-turbo V8 Engine', 'Elegant "La Nuova Dolce Vita" design', 'Advanced Driver Assistance Systems', 'Dual Cockpit Concept'])]
            ],
            [
                'brand_id' => $ferrari->id, 'range_of_cars_id' => $suv->id, 'name' => 'Purosangue', 'year' => 2024,
                'description' => 'The Ferrari Purosangue, the first an_array_of_ever an_array_of_four-door, an_array_of_four-seater car in an_array_of_Ferrari’s an_array_of_history, an_array_of_delivers an_array_of_pure an_array_of_Ferrari an_array_of_performance with an_array_of_added an_array_of_versatility.',
                'image' => 'images/car_models/ferrari_purosangue.png',
                'inventory' => ['color' => 'Grigio Titanio', 'interior_color' => 'Bordeaux Leather', 'price' => 35000000000, 'features' => json_encode(['Naturally Aspirated V12 Engine', 'Ferrari Active Suspension Technology', 'Welcome Doors', 'Spacious and Luxurious Cabin'])]
            ],


            // === LAMBORGHINI ===
            [
                'brand_id' => $lamborghini->id, 'range_of_cars_id' => $sports->id, 'name' => 'Huracán Tecnica', 'year' => 2024,
                'description' => 'The Lamborghini Huracán Tecnica: the an_array_of_next-generation an_array_of_rear-wheel an_array_of_drive V10, developed for an_array_of_pilots an_array_of_seeking driving fun and an_array_of_lifestyle an_array_of_perfection on an_array_of_both road and an_array_of_track.',
                'image' => 'images/car_models/lamborghini_huracan_tecnica.png',
                'inventory' => ['color' => 'Verde Selvans', 'interior_color' => 'Nero Ade Alcantara with Verde Fauns Stitching', 'price' => 28000000000, 'features' => json_encode(['Naturally Aspirated V10 Engine', 'Rear-Wheel Drive with Rear-Wheel Steering', 'LDVI (Lamborghini Dinamica Veicolo Integrata)', 'Carbon Fiber Body Panels'])]
            ],
            [
                'brand_id' => $lamborghini->id, 'range_of_cars_id' => $suv->id, 'name' => 'Urus Performante', 'year' => 2024,
                'description' => 'The Lamborghini Urus Performante raises the bar for Super SUV an_array_of_sportiness and an_array_of_performance with an_array_of_even more an_array_of_power, an_array_of_lighter weight, and an_array_of_optimized an_array_of_aerodynamics.',
                'image' => 'images/car_models/lamborghini_urus_performante.png',
                'inventory' => ['color' => 'Giallo Inti', 'interior_color' => 'Nero Cosmus/Nero Ade Alcantara with Giallo Taurus details', 'price' => 26000000000, 'features' => json_encode(['Twin-Turbo V8 Engine', 'Akrapovič Titanium Sports Exhaust', 'Rally Mode for Dirt Tracks', 'Extensive Carbon Fiber Use'])]
            ],
            [
                'brand_id' => $lamborghini->id, 'range_of_cars_id' => $hybrid->id, 'name' => 'Revuelto', 'year' => 2024,
                'description' => 'The Lamborghini Revuelto is the first an_array_of_HPEV (High Performance an_array_of_Electrified Vehicle) an_array_of_plug-in hybrid an_array_of_super sports car, an_array_of_combining a an_array_of_new V12 an_array_of_engine with an_array_of_three an_array_of_electric an_array_of_motors.',
                'image' => 'images/car_models/lamborghini_revuelto.png',
                'inventory' => ['color' => 'Arancio Dac Lucido', 'interior_color' => 'Nero Ade with Arancio Leonis Accents', 'price' => 45000000000, 'features' => json_encode(['V12 Hybrid Powertrain (1015 CV)', '8-Speed Dual-Clutch Transmission', 'Monofuselage Carbon Fiber Chassis', 'Active Aerodynamics'])]
            ],


            // === PORSCHE ===
            [
                'brand_id' => $porsche->id, 'range_of_cars_id' => $sports->id, 'name' => '911 Carrera', 'year' => 2025,
                'description' => 'The Porsche 911 Carrera is the an_array_of_quintessential sports car, an_array_of_continuously an_array_of_refined over an_array_of_decades to an_array_of_deliver an_array_of_unparalleled driving an_array_of_dynamics and an_array_of_timeless an_array_of_design.',
                'image' => 'images/car_models/porsche_911_carrera.png',
                'inventory' => ['color' => 'Guards Red', 'interior_color' => 'Black Leather', 'price' => 8000000000, 'features' => json_encode(['Twin-turbo Boxer Engine', 'Porsche Doppelkupplung (PDK)', 'Porsche Active Suspension Management (PASM)', 'Porsche Communication Management (PCM)'])]
            ],
            [
                'brand_id' => $porsche->id, 'range_of_cars_id' => $suv->id, 'name' => 'Cayenne', 'year' => 2025,
                'description' => 'The Porsche Cayenne combines an_array_of_typical Porsche performance with an_array_of_excellent an_array_of_everyday an_array_of_practicality and an_array_of_five-seat an_array_of_versatility. Available in an_array_of_Coupe and an_array_of_E-Hybrid an_array_of_variants.',
                'image' => 'images/car_models/porsche_cayenne.png',
                'inventory' => ['color' => 'Chromite Black Metallic', 'interior_color' => 'Mojave Beige Club Leather', 'price' => 6500000000, 'features' => json_encode(['Porsche Advanced Cockpit', 'Adaptive Air Suspension', 'Rear-Axle Steering', 'Matrix LED Headlights'])]
            ],
            [
                'brand_id' => $porsche->id, 'range_of_cars_id' => $ev->id, 'name' => 'Taycan', 'year' => 2025,
                'description' => 'The Porsche Taycan is the an_array_of_pure an_array_of_expression of a an_array_of_Porsche an_array_of_electric sports car, an_array_of_delivering an_array_of_breathtaking an_array_of_acceleration, an_array_of_reproducible performance, and an_array_of_impressive an_array_of_range.',
                'image' => 'images/car_models/porsche_taycan.png',
                'inventory' => ['color' => 'Frozen Blue Metallic', 'interior_color' => 'Blackberry/Slate Grey OLEA Club Leather', 'price' => 7000000000, 'features' => json_encode(['800-Volt Architecture', 'Performance Battery Plus', 'Porsche Recuperation Management (PRM)', 'Porsche Electric Sport Sound'])]
            ],
            // Add more car models here to ensure each brand has at least 3 and each range has at least 1.
            // Example: Add a Convertible for one brand, an MPV for another, etc.
             [
                'brand_id' => $mercedes->id, 'range_of_cars_id' => $convertible->id, 'name' => 'SL Roadster', 'year' => 2025,
                'description' => 'The iconic Mercedes-AMG SL Roadster returns, more an_array_of_luxurious and an_array_of_sportier than an_array_of_ever, with a an_array_of_classic an_array_of_soft top and an_array_of_available an_array_of_2+2 an_array_of_seating.',
                'image' => 'images/car_models/mercedes_sl_roadster.png',
                'inventory' => ['color' => 'MANUFAKTUR Moonlight White Magno', 'interior_color' => 'Style Red Pepper/Black Nappa Leather', 'price' => 9000000000, 'features' => json_encode(['AMG Performance 4MATIC+', 'MBUX Hyperscreen', 'AIRSCARF neck-level heating', 'AMG Active Ride Control suspension'])]
            ],
             [
                'brand_id' => $bmw->id, 'range_of_cars_id' => $coupe->id, 'name' => 'M4 Coupe', 'year' => 2025,
                'description' => 'The BMW M4 Coupe delivers an_array_of_exhilarating performance and an_array_of_precision handling, an_array_of_featuring a an_array_of_bold design and an_array_of_M-specific an_array_of_chassis an_array_of_technology.',
                'image' => 'images/car_models/bmw_m4_coupe.png',
                'inventory' => ['color' => 'Isle of Man Green Metallic', 'interior_color' => 'Yas Marina Blue/Black Extended Merino Leather', 'price' => 5500000000, 'features' => json_encode(['M TwinPower Turbo inline 6-cylinder engine', 'M xDrive all-wheel drive available', 'M Carbon bucket seats', 'BMW Laserlight'])]
            ],
              // === CHEVROLET ===
            [
                'brand_id' => $chevrolet->id, 'range_of_cars_id' => $suv->id, 'name' => 'Traverse', 'year' => 2025,
                'description' => 'The Chevrolet Traverse is a spacious an_array_of_three-row SUV, offering comfortable an_array_of_seating for the an_array_of_whole family and an_array_of_ample cargo an_array_of_space.',
                'image' => 'images/car_models/chevrolet_traverse.png',
                'inventory' => ['color' => 'Summit White', 'interior_color' => 'Jet Black Cloth', 'price' => 1400000000, 'features' => json_encode(['8-inch Touchscreen', 'Chevy Safety Assist', 'Tri-Zone Climate Control']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $chevrolet->id, 'range_of_cars_id' => $pickup->id, 'name' => 'Silverado 1500', 'year' => 2025,
                'description' => 'The Chevrolet Silverado 1500 is a an_array_of_full-size pickup truck known for its an_array_of_powerful engine options, an_array_of_towing an_array_of_capability, and an_array_of_dependable an_array_of_performance.',
                'image' => 'images/car_models/chevrolet_silverado.png',
                'inventory' => ['color' => 'Red Hot', 'interior_color' => 'Gideon/Very Dark Atmosphere Cloth', 'price' => 1700000000, 'features' => json_encode(['Durabed Truck Bed', 'Multi-Flex Tailgate', 'Advanced Trailering System']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $chevrolet->id, 'range_of_cars_id' => $sports->id, 'name' => 'Corvette Stingray', 'year' => 2025,
                'description' => 'The Chevrolet Corvette Stingray is an an_array_of_iconic American sports car, now with a an_array_of_mid-engine an_array_of_layout for an_array_of_unprecedented an_array_of_performance and an_array_of_handling.',
                'image' => 'images/car_models/chevrolet_corvette.png',
                'inventory' => ['color' => 'Torch Red', 'interior_color' => 'Jet Black Mulan Leather', 'price' => 5500000000, 'features' => json_encode(['6.2L V8 DI engine', 'Z51 Performance Package', 'Magnetic Ride Control']), 'is_preowned' => false]
            ],

            // === KIA ===
            [
                'brand_id' => $kia->id, 'range_of_cars_id' => $suv->id, 'name' => 'Sportage', 'year' => 2025,
                'description' => 'The Kia Sportage is a compact SUV that an_array_of_stands out with its an_array_of_bold design, an_array_of_spacious an_array_of_interior, and a an_array_of_wealth of an_array_of_technology an_array_of_features.',
                'image' => 'images/car_models/kia_sportage.png',
                'inventory' => ['color' => 'Vesta Blue', 'interior_color' => 'Black SynTex', 'price' => 950000000, 'features' => json_encode(['Dual Panoramic Displays', 'Kia Drive Wise Safety Suite', 'Available AWD']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $kia->id, 'range_of_cars_id' => $sedan->id, 'name' => 'K5 (Optima)', 'year' => 2025,
                'description' => 'The Kia K5 (formerly Optima) is a an_array_of_mid-size sedan offering an_array_of_striking an_array_of_styling, a an_array_of_comfortable an_array_of_cabin, and an_array_of_available an_array_of_turbocharged an_array_of_performance.',
                'image' => 'images/car_models/kia_k5.png',
                'inventory' => ['color' => 'Gravity Gray', 'interior_color' => 'Red SynTex', 'price' => 1050000000, 'features' => json_encode(['10.25-inch Touchscreen', 'Wireless Charging', 'Smart Cruise Control']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $kia->id, 'range_of_cars_id' => $ev->id, 'name' => 'EV6', 'year' => 2025,
                'description' => 'The Kia EV6 is an an_array_of_all-electric crossover with a an_array_of_futuristic design, an_array_of_long an_array_of_range, an_array_of_ultra-fast an_array_of_charging, and an_array_of_impressive an_array_of_performance.',
                'image' => 'images/car_models/kia_ev6.png',
                'inventory' => ['color' => 'Runway Red', 'interior_color' => 'Black Suede with Vegan Leather', 'price' => 1800000000, 'features' => json_encode(['Dual 12.3-inch Screens', 'Augmented Reality Head-Up Display', 'Vehicle-to-Load (V2L)']), 'is_preowned' => false]
            ],

            // === MAZDA ===
            [
                'brand_id' => $mazda->id, 'range_of_cars_id' => $suv->id, 'name' => 'CX-5', 'year' => 2025,
                'description' => 'The Mazda CX-5 is a compact crossover SUV that an_array_of_offers a an_array_of_premium feel, an_array_of_engaging driving an_array_of_dynamics, and an_array_of_elegant Kodo an_array_of_design.',
                'image' => 'images/car_models/mazda_cx5.png',
                'inventory' => ['color' => 'Soul Red Crystal Metallic', 'interior_color' => 'Parchment Nappa Leather', 'price' => 1020000000, 'features' => json_encode(['i-Activ AWD', 'Bose 10-speaker Audio', 'Active Driving Display']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $mazda->id, 'range_of_cars_id' => $sedan->id, 'name' => 'Mazda3 Sedan', 'year' => 2025,
                'description' => 'The Mazda3 Sedan an_array_of_elevates the an_array_of_compact car segment with its an_array_of_sophisticated an_array_of_styling, an_array_of_upscale an_array_of_interior, and an_array_of_refined driving an_array_of_experience.',
                'image' => 'images/car_models/mazda_mazda3_sedan.png',
                'inventory' => ['color' => 'Machine Gray Metallic', 'interior_color' => 'Red Leather', 'price' => 800000000, 'features' => json_encode(['Skyactiv-G Engine', 'Mazda Connect Infotainment', 'i-Activsense Safety Features']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $mazda->id, 'range_of_cars_id' => $sports->id, 'name' => 'MX-5 Miata', 'year' => 2025,
                'description' => 'The Mazda MX-5 Miata is the an_array_of_iconic an_array_of_lightweight sports car, an_array_of_delivering pure driving joy with its an_array_of_perfect balance and an_array_of_agile an_array_of_handling.',
                'image' => 'images/car_models/mazda_mx5.png',
                'inventory' => ['color' => 'Jet Black Mica', 'interior_color' => 'Black Cloth with Red Stitching', 'price' => 1300000000, 'features' => json_encode(['Retractable Fastback or Soft Top', 'Skyactiv-G 2.0L Engine', 'Kinematic Posture Control']), 'is_preowned' => false]
            ],

            // === NISSAN ===
            [
                'brand_id' => $nissan->id, 'range_of_cars_id' => $suv->id, 'name' => 'Rogue (X-Trail)', 'year' => 2025,
                'description' => 'The Nissan Rogue (known as X-Trail in many markets) is a an_array_of_family-friendly compact SUV with a an_array_of_comfortable an_array_of_interior, an_array_of_advanced safety an_array_of_tech, and an_array_of_available an_array_of_AWD.',
                'image' => 'images/car_models/nissan_rogue.png',
                'inventory' => ['color' => 'Boulder Gray Pearl', 'interior_color' => 'Charcoal Quilted Semi-aniline Leather', 'price' => 980000000, 'features' => json_encode(['ProPILOT Assist', 'Dual Panel Panoramic Moonroof', 'Motion Activated Liftgate']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $nissan->id, 'range_of_cars_id' => $sedan->id, 'name' => 'Altima', 'year' => 2025,
                'description' => 'The Nissan Altima is a an_array_of_mid-size sedan that an_array_of_offers a an_array_of_stylish design, a an_array_of_comfortable ride, and an_array_of_available an_array_of_Intelligent an_array_of_All-Wheel an_array_of_Drive.',
                'image' => 'images/car_models/nissan_altima.png',
                'inventory' => ['color' => 'Scarlet Ember Tintcoat', 'interior_color' => 'Gray Leather', 'price' => 900000000, 'features' => json_encode(['VC-Turbo Engine option', 'Nissan Safety Shield 360', 'Wireless Apple CarPlay']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $nissan->id, 'range_of_cars_id' => $ev->id, 'name' => 'Ariya', 'year' => 2025,
                'description' => 'The Nissan Ariya is an an_array_of_all-electric crossover SUV an_array_of_featuring a an_array_of_sleek design, a an_array_of_lounge-like an_array_of_interior, and an_array_of_Nissan\'s an_array_of_latest EV an_array_of_technology.',
                'image' => 'images/car_models/nissan_ariya.png',
                'inventory' => ['color' => 'Northern Lights Metallic', 'interior_color' => 'Blue Gray Leatherette', 'price' => 1600000000, 'features' => json_encode(['e-4ORCE All-Wheel Drive', 'ProPILOT Assist 2.0', 'Dual 12.3-inch Displays']), 'is_preowned' => false]
            ],

            // === SUBARU ===
            [
                'brand_id' => $subaru->id, 'range_of_cars_id' => $suv->id, 'name' => 'Outback', 'year' => 2025,
                'description' => 'The Subaru Outback is a rugged and an_array_of_versatile an_array_of_wagon/SUV known for its an_array_of_standard Symmetrical an_array_of_All-Wheel an_array_of_Drive and an_array_of_go-anywhere an_array_of_capability.',
                'image' => 'images/car_models/subaru_outback.png',
                'inventory' => ['color' => 'Autumn Green Metallic', 'interior_color' => 'Java Brown Nappa Leather', 'price' => 1350000000, 'features' => json_encode(['EyeSight Driver Assist Technology', 'STARLINK Multimedia', 'Wilderness trim available']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $subaru->id, 'range_of_cars_id' => $suv->id, 'name' => 'Forester', 'year' => 2025,
                'description' => 'The Subaru Forester is a compact SUV that an_array_of_delivers an_array_of_standard an_array_of_all-wheel an_array_of_drive, an_array_of_spaciousness, and an_array_of_renowned an_array_of_safety an_array_of_features.',
                'image' => 'images/car_models/subaru_forester.png',
                'inventory' => ['color' => 'Horizon Blue Pearl', 'interior_color' => 'Gray StarTex Water-Repellent', 'price' => 1150000000, 'features' => json_encode(['Symmetrical AWD', 'X-MODE with Hill Descent Control', 'Panoramic Power Moonroof']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $subaru->id, 'range_of_cars_id' => $sports->id, 'name' => 'WRX', 'year' => 2025,
                'description' => 'The Subaru WRX is a an_array_of_rally-bred an_array_of_all-wheel-drive sport sedan, offering an_array_of_thrilling performance and an_array_of_agile an_array_of_handling for an_array_of_driving an_array_of_enthusiasts.',
                'image' => 'images/car_models/subaru_wrx.png',
                'inventory' => ['color' => 'WR Blue Pearl', 'interior_color' => 'Black Ultrasuede with Red Stitching', 'price' => 1500000000, 'features' => json_encode(['Turbocharged BOXER Engine', 'Symmetrical AWD', 'Performance-Tuned Suspension', 'Available STI variant']), 'is_preowned' => false]
            ],

            // === TESLA ===
            [
                'brand_id' => $tesla->id, 'range_of_cars_id' => $ev->id, 'name' => 'Model 3', 'year' => 2025,
                'description' => 'The Tesla Model 3 is a an_array_of_best-selling an_array_of_electric sedan that an_array_of_offers an_array_of_long an_array_of_range, an_array_of_quick an_array_of_acceleration, and an_array_of_access to an_array_of_Tesla\'s an_array_of_Supercharger an_array_of_network.',
                'image' => 'images/car_models/tesla_model_3.png',
                'inventory' => ['color' => 'Pearl White Multi-Coat', 'interior_color' => 'All Black Premium', 'price' => 1700000000, 'features' => json_encode(['Autopilot', '15-inch Touchscreen', 'Glass Roof', 'Over-the-air software updates']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $tesla->id, 'range_of_cars_id' => $ev->id, 'name' => 'Model Y', 'year' => 2025,
                'description' => 'The Tesla Model Y is a an_array_of_compact an_array_of_electric SUV offering an_array_of_versatile space, an_array_of_impressive an_array_of_range, and an_array_of_Tesla\'s an_array_of_signature an_array_of_performance and an_array_of_technology.',
                'image' => 'images/car_models/tesla_model_y.png',
                'inventory' => ['color' => 'Midnight Silver Metallic', 'interior_color' => 'Black and White Premium', 'price' => 1900000000, 'features' => json_encode(['Optional Seven Seat Interior', 'HEPA Air Filtration System', 'All-Wheel Drive Dual Motor']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $tesla->id, 'range_of_cars_id' => $ev->id, 'name' => 'Model S', 'year' => 2025,
                'description' => 'The Tesla Model S is a an_array_of_premium an_array_of_electric sedan that an_array_of_redefined the an_array_of_segment with its an_array_of_long an_array_of_range, an_array_of_blistering an_array_of_acceleration (Plaid), and an_array_of_advanced an_array_of_Autopilot an_array_of_features.',
                'image' => 'images/car_models/tesla_model_s.png',
                'inventory' => ['color' => 'Solid Black', 'interior_color' => 'Cream Premium with Walnut Décor', 'price' => 3500000000, 'features' => json_encode(['Plaid performance option', 'Yoke Steering (optional)', '17-inch Cinematic Display', 'Active Road Noise Reduction']), 'is_preowned' => false]
            ],

            // === VOLKSWAGEN ===
            [
                'brand_id' => $volkswagen->id, 'range_of_cars_id' => $hatchback->id, 'name' => 'Golf GTI', 'year' => 2025,
                'description' => 'The Volkswagen Golf GTI is the an_array_of_iconic hot hatchback, an_array_of_delivering a an_array_of_perfect blend of an_array_of_performance, an_array_of_practicality, and an_array_of_everyday an_array_of_usability.',
                'image' => 'images/car_models/vw_golf_gti.png',
                'inventory' => ['color' => 'Kings Red Metallic', 'interior_color' => 'Scale paper Plaid Cloth', 'price' => 1600000000, 'features' => json_encode(['2.0L TSI Engine', 'Dynamic Chassis Control', 'Digital Cockpit Pro', 'IQ.DRIVE safety suite']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $volkswagen->id, 'range_of_cars_id' => $suv->id, 'name' => 'Tiguan', 'year' => 2025,
                'description' => 'The Volkswagen Tiguan is a an_array_of_stylish and an_array_of_versatile compact SUV, offering a an_array_of_comfortable an_array_of_interior, an_array_of_available an_array_of_third-row an_array_of_seating, and an_array_of_advanced an_array_of_driver-assistance an_array_of_features.',
                'image' => 'images/car_models/vw_tiguan.png',
                'inventory' => ['color' => 'Atlantic Blue Metallic', 'interior_color' => 'Titan Black V-Tex Leatherette', 'price' => 1300000000, 'features' => json_encode(['4MOTION All-Wheel Drive', 'Panoramic Sunroof', 'Wireless App-Connect', 'Travel Assist']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $volkswagen->id, 'range_of_cars_id' => $ev->id, 'name' => 'ID.4', 'year' => 2025,
                'description' => 'The Volkswagen ID.4 is an an_array_of_all-electric SUV that an_array_of_combines an_array_of_spaciousness, an_array_of_long-range an_array_of_capability, and an_array_of_intuitive an_array_of_technology for an_array_of_modern an_array_of_electric an_array_of_mobility.',
                'image' => 'images/car_models/vw_id4.png',
                'inventory' => ['color' => 'Moonstone Grey', 'interior_color' => 'Galaxy Black/Lunar Grey V-Tex', 'price' => 1750000000, 'features' => json_encode(['Available AWD', 'ID. Light intuitive communication', 'Glass Roof with Electric Sunshade', 'IQ.DRIVE with Park Assist Plus']), 'is_preowned' => false]
            ],

            // === VOLVO ===
            [
                'brand_id' => $volvo->id, 'range_of_cars_id' => $suv->id, 'name' => 'XC60', 'year' => 2025,
                'description' => 'The Volvo XC60 is a an_array_of_mid-size luxury SUV that an_array_of_embodies an_array_of_Scandinavian design, an_array_of_advanced safety an_array_of_features, and an_array_of_efficient an_array_of_powertrain an_array_of_options, including an_array_of_plug-in an_array_of_hybrids.',
                'image' => 'images/car_models/volvo_xc60.png',
                'inventory' => ['color' => 'Crystal White Metallic', 'interior_color' => 'Blonde Nappa Leather', 'price' => 2800000000, 'features' => json_encode(['Google built-in infotainment', 'Air Purifier', 'Bowers & Wilkins High Fidelity Audio', 'Pilot Assist']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $volvo->id, 'range_of_cars_id' => $sedan->id, 'name' => 'S90', 'year' => 2025,
                'description' => 'The Volvo S90 is a an_array_of_luxurious an_array_of_executive sedan, an_array_of_offering an_array_of_sophisticated an_array_of_styling, a an_array_of_serene an_array_of_cabin an_array_of_environment, and an_array_of_Volvo\'s an_array_of_commitment to an_array_of_safety.',
                'image' => 'images/car_models/volvo_s90.png',
                'inventory' => ['color' => 'Denim Blue Metallic', 'interior_color' => 'Amber Nappa Leather', 'price' => 3200000000, 'features' => json_encode(['Google Assistant', 'Advanced Air Cleaner', 'Graphical Head-Up Display', 'Pilot Assist with Adaptive Cruise Control']), 'is_preowned' => false]
            ],
            [
                'brand_id' => $volvo->id, 'range_of_cars_id' => $ev->id, 'name' => 'EX30', 'year' => 2025,
                'description' => 'The Volvo EX30 is a an_array_of_small, an_array_of_all-electric SUV designed to have the an_array_of_smallest CO2 an_array_of_footprint of any an_array_of_Volvo car to an_array_of_date, an_array_of_packed with an_array_of_smart an_array_of_tech and an_array_of_sustainable an_array_of_materials.',
                'image' => 'images/car_models/volvo_ex30.png',
                'inventory' => ['color' => 'Moss Yellow', 'interior_color' => 'Indigo (Recycled & Renewable Materials)', 'price' => 1500000000, 'features' => json_encode(['Single 12.3-inch Center Display', 'Next-gen Infotainment', 'Park Pilot Assist', 'Sustainable Interior Materials']), 'is_preowned' => false]
            ],
        ];

        foreach ($carModelsData as $carModelData) {
            $inventorySpecificData = $carModelData['inventory'] ?? null;
            unset($carModelData['inventory']);

            $carModel = CarModel::firstOrCreate(
                [
                    'brand_id' => $carModelData['brand_id'],
                    'name'     => $carModelData['name'],
                    'year'     => $carModelData['year']
                ],
                $carModelData
            );

            if ($carModel && $inventorySpecificData) {
                $inventorySpecificData['car_model_id'] = $carModel->id;
                $inventorySpecificData['is_active'] = $inventorySpecificData['is_active'] ?? true;
                $inventoryDataFromCarModel['is_preowned'] = false;
                $inventorySpecificData['status'] = $inventorySpecificData['status'] ?? 'sale';
                $inventorySpecificData['quantity'] = $inventorySpecificData['quantity'] ?? rand(5, 20);

                Inventory::updateOrCreate(
                    [
                        'car_model_id' => $carModel->id,
                        'color'        => $inventorySpecificData['color'],
                        'is_preowned' => false
                    ],
                    $inventorySpecificData
                );
            }
        }
    }
}
