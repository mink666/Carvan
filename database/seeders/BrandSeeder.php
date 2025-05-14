<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands =[
                [
                    'name' => 'Toyota',
                    'company_full_name' => 'Toyota Motor Corporation',
                    'year' => '1937',
                    'founder' => 'Kiichiro Toyoda',
                    'description' => 'Toyota Motor Corporation is a Japanese multinational automotive manufacturer headquartered in Toyota City, Aichi, Japan. It is one of the largest automobile manufacturers in the world, producing about 10 million vehicles per year. Toyota is renowned for its reliability, fuel efficiency, and pioneering hybrid technology with models like the Prius and Camry Hybrid. The brand emphasizes quality, durability, and continuous improvement (Kaizen) in its manufacturing processes.',
                    'logo' => 'images/logos/toyota_logo.png',
                    'motto' => "Let's Go Places",
                    'website_url' => 'https://www.toyota.com/',
                    'cover_image' => 'images/covers/toyota_cover.png',
                    'key_achievements' => json_encode([
                        "Pioneered mass-market hybrid vehicles (Prius)",
                        "Corolla: One of the best-selling cars of all time",
                        "Consistent high rankings in reliability and quality surveys",
                        "Development of Toyota Safety Sense (TSS) advanced safety suite"
                    ]),
                    'location' => 'Aichi, Japan',
                ],
                [
                    'name' => 'Honda',
                    'company_full_name' => 'Honda Motor Co., Ltd.',
                    'year' => '1948',
                    'founder' => 'Soichiro Honda',
                    'description' => 'Honda is a Japanese public multinational conglomerate manufacturer of automobiles, motorcycles, and power equipment. Honda has been the world\'s largest motorcycle manufacturer since 1959, as well as the world\'s largest manufacturer of internal combustion engines measured by volume, producing more than 14 million internal combustion engines each year. The company is known for its engineering prowess, innovative VTEC engine technology, and reliable vehicles like the Civic and Accord.',
                    'logo' => 'images/logos/honda_logo.png',
                    'motto' => 'The Power of Dreams',
                    'website_url' => 'https://www.honda.com/',
                    'cover_image' => 'images/covers/honda_cover.png',
                    'key_achievements' => json_encode([
                        "World's largest motorcycle manufacturer",
                        "Leader in internal combustion engine production",
                        "Development of VTEC engine technology",
                        "Pioneering work in robotics (ASIMO)"
                    ]),
                    'location' => 'Tokyo, Japan',
                ],
                [
                    'name' => 'Ford',
                    'company_full_name' => 'Ford Motor Company',
                    'year' => '1903',
                    'founder' => 'Henry Ford',
                    'description' => 'Ford Motor Company is an American multinational automaker that has its main headquarters in Dearborn, Michigan, a suburb of Detroit. It was founded by Henry Ford and incorporated on June 16, 1903. The company sells automobiles and commercial vehicles under the Ford brand and most luxury cars under the Lincoln brand. Ford is known for revolutionizing automotive manufacturing with the assembly line and for iconic vehicles like the Model T, Mustang, and F-Series trucks.',
                    'logo' => 'images/logos/ford_logo.png',
                    'motto' => 'Go Further',
                    'website_url' => 'https://www.ford.com/',
                    'cover_image' => 'images/covers/ford_cover.png',
                    'key_achievements' => json_encode([
                        "Introduced the moving assembly line for mass production",
                        "Ford F-Series: America's best-selling truck for decades",
                        "Iconic Ford Mustang shaping the pony car segment",
                        "Innovations with EcoBoost® engine technology"
                    ]),
                    'location' => 'Michigan, USA',
                ],
                [
                    'name' => 'Hyundai',
                    'company_full_name' => 'Hyundai Motor Company',
                    'year' => '1967',
                    'founder' => 'Chung Ju-yung',
                    'description' => 'Hyundai Motor Company is a South Korean multinational automotive manufacturer headquartered in Seoul, South Korea. Hyundai operates the world\'s largest integrated automobile manufacturing facility in Ulsan, South Korea. The company has made significant strides in quality, design, and technology, offering a diverse range of vehicles including sedans, SUVs, and innovative electric vehicles under the IONIQ sub-brand.',
                    'logo' => 'images/logos/hyundai_logo.png',
                    'motto' => 'Progress for Humanity',
                    'website_url' => 'https://www.hyundai.com/worldwide/en',
                    'cover_image' => 'images/covers/hyundai_cover.png',
                    'key_achievements' => json_encode([
                        "Rapid global growth and market share expansion",
                        "Significant improvements in vehicle quality and design (e.g., Fluidic Sculpture design language)",
                        "Development of the IONIQ dedicated EV lineup",
                        "Advancements in hydrogen fuel cell technology (NEXO)"
                    ]),
                    'location' => 'Seoul, South Korea',
                ],
                [
                    'name' => 'Mercedes-Benz',
                    'company_full_name' => 'Mercedes-Benz Group AG',
                    'year' => '1886',
                    'founder' => 'Karl Benz and Gottlieb Daimler',
                    'description' => 'Mercedes-Benz, a German global automotive marque and a division of Daimler AG, is known for luxury vehicles, buses, coaches, and trucks. With a legacytracing back to Karl Benz\'s creation of the first internal combustion engine in a car, the Benz Patent Motorwagen, patented in January 1886, and Gottlieb Daimler and engineer Wilhelm Maybach\'s conversion of a stagecoach by the addition of a petrol engine the same year. Mercedes-Benz has consistently been a pioneer in automotive innovation, safety, and luxury, offering a wide range of vehicles that embody engineering excellence and timeless design.',
                    'logo' => 'images/logos/mercedes_logo.png',
                    'motto' => 'The Best or Nothing',
                    'website_url' => 'https://www.mercedes-benz.com/',
                    'cover_image' => 'images/covers/mercedes_cover.png',
                    'key_achievements' => json_encode([
                        "Invention of the first automobile (Benz Patent-Motorwagen, 1886)",
                        "Pioneering safety innovations (e.g., crumple zones, ABS, airbags)",
                        "Long history of luxury and performance vehicles (S-Class, SL, AMG models)",
                        "Early adoption and development of diesel engine technology for passenger cars"
                    ]),
                    'location' => 'Stuttgart, Germany',
                ],
                [
                    'name' => 'BMW',
                    'company_full_name' => 'Bayerische Motoren Werke AG',
                    'year' => '1916',
                    'founder' => 'Franz Josef Popp',
                    'description' => 'Bayerische Motoren Werke AG, commonly referred to as BMW, is a German multinational corporation which produces luxury vehicles and motorcycles. The company was founded in 1916 as a manufacturer of aircraft engines, which it produced from 1917 until 1918 and again from 1933 to 1945. BMW is renowned for its focus on driving dynamics, performance-oriented engineering, and a distinctive sporty character across its model lineup, from compact sedans to luxury SUVs and high-performance M models.',
                    'logo' => 'images/logos/bmw_logo.png',
                    'motto' => 'The Ultimate Driving Machine',
                    'website_url' => 'https://www.bmw.com/',
                    'cover_image' => 'images/covers/bmw_cover.png',
                    'key_achievements' => json_encode([
                        "Reputation for creating 'The Ultimate Driving Machine'",
                        "Successful M Performance division with iconic sports cars",
                        "Pioneering use of carbon fiber in mass-produced vehicles (BMW i3, i8)",
                        "Advanced iDrive infotainment system"
                    ]),
                    'location' => 'Munich, Germany',
                ],
                [
                    'name' => 'Audi',
                    'company_full_name' => 'Audi AG',
                    'year' => '1909',
                    'founder' => 'August Horch',
                    'description' => 'Audi AG is a German automotive manufacturer that designs, engineers, produces, markets and distributes luxury vehicles. Audi is a member of the Volkswagen Group and has its roots at Ingolstadt, Bavaria, Germany. Audi-branded vehicles are produced in nine production facilities worldwide. The company\'s name is based on the Latin translation of the surname of the founder, August Horch. "Horch", meaning "listen" in German, becomes "audi" in Latin. Audi is known for its innovative technology, sophisticated design, and its Quattro all-wheel-drive system.',
                    'logo' => 'images/logos/audi_logo.png',
                    'motto' => 'Advancement through Technology',
                    'website_url' => 'https://www.audi.com/',
                    'cover_image' => 'images/covers/audi_cover.png',
                    'key_achievements' => json_encode([
                        "Pioneering Quattro all-wheel-drive system, revolutionizing rally racing",
                        "Leader in automotive lighting technology (LED, Matrix LED, Laser light)",
                        "High-quality interiors and advanced MMI infotainment systems",
                        "Strong focus on performance RS models"
                    ]),
                    'location' => 'Ingolstadt, Germany',
                ],
                [
                    'name' => 'Ferrari',
                    'company_full_name' => 'Ferrari S.p.A.',
                    'year' => '1939',
                    'founder' => 'Enzo Ferrari',
                    'description' => 'Ferrari is an Italian luxury sports car manufacturer based in Maranello, Italy. Founded by Enzo Ferrari in 1939 as Auto Avio Costruzioni, the company built its first car in 1940, and produced its first Ferrari-badged car in 1947. Ferrari is synonymous with Formula One racing success, high-performance V8 and V12 engines, and iconic, an_array_of_passionately designed supercars. The Prancing Horse emblem is a global symbol of speed, luxury, and Italian automotive excellence.',
                    'logo' => 'images/logos/ferrari_logo.png',
                    'motto' => 'We Are the Competition',
                    'website_url' => 'https://www.ferrari.com/',
                    'cover_image' => 'images/covers/ferrari_cover.png',
                    'key_achievements' => json_encode([
                        "Most successful team in Formula One history",
                        "Creator of some of the world's most desirable and iconic supercars",
                        "Renowned for high-revving, naturally aspirated V8 and V12 engines (though now also embracing turbocharging and hybridization)",
                        "Exclusive and limited production models maintaining high brand value"
                    ]),
                    'location' => 'Maranello, Italy',
                ],
                [
                    'name' => 'Lamborghini',
                    'company_full_name' => 'Automobili Lamborghini S.p.A.',
                    'year' => '1963',
                    'founder' => 'Ferruccio Lamborghini',
                    'description' => 'Automobili Lamborghini S.p.A. is an Italian brand and manufacturer of luxury sports cars and SUVs based in Sant\'Agata Bolognese. The company is owned by the Volkswagen Group through its subsidiary Audi. Founded in 1963 by Ferruccio Lamborghini to compete with established marques, including Ferrari, Lamborghini is known for its powerful V10 and V12 engines, an_array_of_outlandish and an_array_of_aggressive styling, and an_array_of_extreme performance. Models like the Miura, Countach, Diablo, Murciélago, Aventador, and Huracán have become automotive legends.',
                    'logo' => 'images/logos/lamborghini_logo.png',
                    'motto' => 'Expect the Unexpected',
                    'website_url' => 'https://www.lamborghini.com/',
                    'cover_image' => 'images/covers/lamborghini_cover.png',
                    'key_achievements' => json_encode([
                        "Creation of the Miura, often considered the first supercar with a mid-engine V12 layout",
                        "Iconic 'wedge' designs and scissor doors (Countach, Aventador)",
                        "Consistent production of extreme, high-performance V10 and V12 supercars",
                        "Successful expansion into the luxury SUV market with the Urus"
                    ]),
                    'location' => 'Sant\'Agata Bolognese, Italy',
                ],
                [
                    'name' => 'Porsche',
                    'company_full_name' => 'Dr. Ing. h.c. F. Porsche AG',
                    'year' => '1931',
                    'founder' => 'Ferdinand Porsche',
                    'description' => 'Dr. Ing. h.c. F. Porsche AG, usually shortened to Porsche, is a German automobile manufacturer specializing in high-performance sports cars, SUVs and sedans. Porsche is headquartered in Stuttgart, and is owned by Volkswagen AG. The company was founded by Ferdinand Porsche in 1931. Porsche is best known for its iconic 911 sports car, a rear-engined model that has been in continuous production since 1964. The brand is also a dominant force in motorsport, with a record number of wins at the 24 Hours of Le Mans.',
                    'logo' => 'images/logos/porsche_logo.png',
                    'motto' => 'There Is No Substitute',
                    'website_url' => 'https://www.porsche.com/',
                    'cover_image' => 'images/covers/porsche_cover.png',
                    'key_achievements' => json_encode([
                        "The iconic Porsche 911, a continuously evolved sports car legend",
                        "Dominance in motorsport, particularly endurance racing (e.g., 24 Hours of Le Mans)",
                        "Engineering excellence in handling, braking, and powertrain technology",
                        "Successful expansion into luxury SUVs (Cayenne) and EVs (Taycan) while maintaining brand DNA"
                    ]),
                    'location' => 'Stuttgart, Germany',
                ],
                [
                    'name' => 'Tesla',
                    'company_full_name' => 'Tesla, Inc.',
                    'year' => '2003',
                    'founder' => 'Martin Eberhard, Marc Tarpenning, Elon Musk, JB Straubel, Ian Wright',
                    'description' => 'Tesla, Inc. is an American electric vehicle and clean energy company based in Palo Alto, California. Founded in 2003, Tesla\'s mission is to accelerate the world\'s transition to sustainable energy. The company is known for its electric cars, battery energy storage from home to grid-scale, solar panels and solar roof tiles, and related products and services. Tesla has revolutionized the automotive industry with its high-performance electric vehicles (EVs) like the Model S, Model 3, Model X, and Model Y.',
                    'logo' => 'images/logos/tesla_logo.png',
                    'motto' => 'Accelerating Sustainable Transport',
                    'website_url' => 'https://www.tesla.com/',
                    'cover_image' => 'images/covers/tesla_cover.png',
                    'key_achievements' => json_encode([
                        "Pioneered the luxury electric sedan market with the Model S",
                        "Significant advancements in battery technology and range (over 370 miles on a single charge)",
                        "Development of Autopilot and Full Self-Driving capabilities",
                        "Expansion into energy solutions with Powerwall and Solar Roof"
                    ]),
                    'location' => 'California, USA',
                ],
                [
                    'name' => 'Chevrolet',
                    'company_full_name' => 'Chevrolet Motor Division of General Motors Company',
                    'year' => '1911',
                    'founder' => 'Louis Chevrolet and William C. Durant',
                    'description' => 'Chevrolet, colloquially referred to as Chevy, is an American automobile division of the American manufacturer General Motors (GM). Founded in 1911 by Louis Chevrolet and William C. Durant, Chevrolet is known for its wide range of vehicles, from compact cars to full-size trucks. The brand has a strong presence in motorsports and is recognized for iconic models like the Corvette and Camaro.',
                    'logo' => 'images/logos/chevrolet_logo.png',
                    'motto' => 'Find New Roads',
                    'website_url' => 'https://www.chevrolet.com/',
                    'cover_image' => 'images/covers/chevrolet_cover.png',
                    'key_achievements' => json_encode([
                        "Corvette: America's sports car with a rich racing heritage",
                        "Silverado: One of the best-selling trucks in America",
                        "Innovations in fuel efficiency and safety features",
                        "Strong presence in motorsports, particularly NASCAR"
                    ]),
                    'location' => 'Michigan, USA',
                ],
                [
                    'name' => 'Nissan',
                    'company_full_name' => 'Nissan Motor Co., Ltd.',
                    'year' => '1933',
                    'founder' => 'Yoshisuke Aikawa',
                    'description' => 'Nissan Motor Co., Ltd. is a Japanese multinational automobile manufacturer headquartered in Yokohama, Japan. Nissan is known for its wide range of vehicles, from compact cars to SUVs and trucks. The company has made significant strides in electric vehicle technology with the Nissan Leaf, one of the world\'s best-selling electric cars. Nissan is also recognized for its performance-oriented Nismo division and innovative technologies like ProPILOT Assist.',
                    'logo' => 'images/logos/nissan_logo.png',
                    'motto' => 'Innovation That Excites',
                    'website_url' => 'https://www.nissan-global.com/',
                    'cover_image' => 'images/covers/nissan_cover.png',
                    'key_achievements' => json_encode([
                        "Pioneering electric vehicle technology with the Nissan Leaf",
                        "Strong presence in motorsports with Nismo performance division",
                        "Innovative safety features (e.g., ProPILOT Assist)",
                        "Diverse lineup catering to various market segments"
                    ]),
                    'location' => 'Yokohama, Japan',
                ],
                [
                    'name' => 'Subaru',
                    'company_full_name' => 'Subaru Corporation',
                    'year' => '1953',
                    'founder' => 'Kenji Kita',
                    'description' => 'Subaru Corporation is a Japanese multinational corporation that manufactures automobiles, aerospace products, and industrial products. Subaru is known for its all-wheel-drive vehicles and boxer engine technology. The brand has a strong following among outdoor enthusiasts and is recognized for its rugged, reliable vehicles like the Outback and Forester.',
                    'logo' => 'images/logos/subaru_logo.png',
                    'motto' => 'Confidence in Motion',
                    'website_url' => 'https://www.subaru.com/',
                    'cover_image' => 'images/covers/subaru_cover.png',
                    'key_achievements' => json_encode([
                        "Pioneering all-wheel-drive technology in passenger cars",
                        "Strong reputation for safety and reliability",
                        "Iconic Subaru WRX and STI models with motorsport heritage",
                        "Commitment to environmental sustainability with eco-friendly technologies"
                    ]),
                    'location' => 'Tokyo, Japan',
                ],
                [
                    'name' => 'Volkswagen',
                    'company_full_name' => 'Volkswagen AG',
                    'year' => '1937',
                    'founder' => 'Ferdinand Porsche',
                    'description' => 'Volkswagen AG is a German automaker headquartered in Wolfsburg, Germany. The company was founded in 1937 and is known for its iconic Beetle and the modern Golf, which has become one of the best-selling cars in the world. Volkswagen is part of the Volkswagen Group, which includes several other brands like Audi, Porsche, and Lamborghini. The brand emphasizes quality, safety, and innovative technology in its vehicles.',
                    'logo' => 'images/logos/volkswagen_logo.png',
                    'motto' => 'Das Auto',
                    'website_url' => 'https://www.volkswagen.com/',
                    'cover_image' => 'images/covers/volkswagen_cover.png',
                    'key_achievements' => json_encode([
                        "Iconic Beetle: One of the best-selling cars of all time",
                        "Golf: A benchmark in the compact car segment",
                        "Innovations in diesel technology (TDI engines)",
                        "Commitment to electric mobility with ID. series"
                    ]),
                    'location' => 'Wolfsburg, Germany',
                ],
                [
                    'name' => 'Mazda',
                    'company_full_name' => 'Mazda Motor Corporation',
                    'year' => '1920',
                    'founder' => 'Jujiro Matsuda',
                    'description' => 'Mazda Motor Corporation is a Japanese automaker based in Fuchu, Hiroshima, Japan. Founded in 1920, Mazda is known for its innovative engineering, particularly its rotary engines and Skyactiv technology. The brand emphasizes driving pleasure and has a strong motorsport heritage, with models like the MX-5 Miata being celebrated for their lightweight and agile handling.',
                    'logo' => 'images/logos/mazda_logo.png',
                    'motto' => 'Feel Alive',
                    'website_url' => 'https://www.mazda.com/',
                    'cover_image' => 'images/covers/mazda_cover.png',
                    'key_achievements' => json_encode([
                        "Pioneering rotary engine technology (Wankel engine)",
                        "MX-5 Miata: The best-selling two-seater sports car in history",
                        "Innovative Skyactiv technology for fuel efficiency and performance",
                        "Strong presence in motorsports, particularly in endurance racing"
                    ]),
                    'location' => 'Hiroshima, Japan',
                ],
                [
                    'name' => 'Kia',
                    'company_full_name' => 'Kia Corporation',
                    'year' => '1944',
                    'founder' => 'Kim Cheol-ho',
                    'description' => 'Kia Corporation is a South Korean multinational automotive manufacturer headquartered in Seoul, South Korea. Founded in 1944, Kia is known for its stylish and affordable vehicles, with a strong emphasis on design and technology. The brand has made significant strides in quality and innovation, offering a diverse range of vehicles from compact cars to SUVs.',
                    'logo' => 'images/logos/kia_logo.png',
                    'motto' => 'The Power to Surprise',
                    'website_url' => 'https://www.kia.com/',
                    'cover_image' => 'images/covers/kia_cover.png',
                    'key_achievements' => json_encode([
                        "Rapid improvement in vehicle quality and design",
                        "Strong presence in the SUV market with models like the Sportage and Sorento",
                        "Innovative technologies like UVO infotainment system",
                        "Commitment to sustainability with electric and hybrid models"
                    ]),
                    'location' => 'Seoul, South Korea',
                ],
                [
                    'name' => 'Volvo',
                    'company_full_name' => 'Volvo Car Corporation',
                    'year' => '1927',
                    'founder' => 'Assar Gabrielsson and Gustaf Larson',
                    'description' => 'Volvo Car Corporation is a Swedish luxury automobile manufacturer headquartered in Gothenburg, Sweden. Founded in 1927, Volvo is known for its commitment to safety, quality, and environmental sustainability. The brand has a strong reputation for producing safe and reliable vehicles, with innovations like the three-point seatbelt and advanced driver-assistance systems.',
                    'logo' => 'images/logos/volvo_logo.png',
                    'motto' => 'For Life',
                    'website_url' => 'https://www.volvocars.com/',
                    'cover_image' => 'images/covers/volvo_cover.png',
                    'key_achievements' => json_encode([
                        "Pioneering automotive safety features (three-point seatbelt)",
                        "Strong commitment to sustainability and electrification (Recharge series)",
                        "Innovative infotainment systems with Google integration",
                        "Reputation for high-quality interiors and Scandinavian design"
                    ]),
                    'location' => 'Gothenburg, Sweden',
                ]
        ];

        foreach ($brands as $brandData) {
            Brand::firstOrCreate(['name' => $brandData['name']], $brandData);
        }
    }
}
