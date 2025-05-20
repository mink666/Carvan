<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'Mercedes-Benz Introduces 2024 S-Class',
                'content' => '<p>Mercedes-Benz has unveiled the updated version of their luxury S-Class with notable improvements in technology and design. Key highlights of the 2024 version include:</p>
                <ul>
                    <li>Revolutionary MBUX infotainment system featuring a 12.8-inch OLED display with haptic feedback, augmented reality navigation, and natural language processing capable of understanding complex commands in 27 languages</li>
                    <li>Advanced Level 3 autonomous driving system with LiDAR technology, allowing hands-free operation up to 60 km/h in heavy traffic conditions, with automatic lane changing and predictive route adaptation</li>
                    <li>Next-generation Digital Light technology incorporating 2.6 million pixels per headlight, capable of projecting warning symbols and navigation guidance directly onto the road surface</li>
                    <li>Enhanced comfort features including new hot stone massage seats with 10 different programs, active ambient lighting that synchronizes with music, and an advanced air filtration system with nanofiber technology</li>
                    <li>Rear-seat entertainment package with two 11.6-inch touchscreens, enabling video conferencing and streaming capabilities through built-in 5G connectivity</li>
                </ul>
                <p>The vehicle is expected to be available in Vietnam market in Q3 2024 with 3 versions: S450 4MATIC, S500 4MATIC, and S580 4MATIC.</p>',
                'image' => 'news_events/mercedes-sclass-2024.png',
                'date' => Carbon::now()->subDays(2),

            ],
            [
                'title' => 'BMW iX M60 2024 - Perfect Blend of Performance and Luxury',
                'content' => '<p>BMW has introduced the high-performance electric vehicle iX M60 2024 with impressive specifications:</p>
                <ul>
                    <li>Dual electric motors delivering a combined output of 619 horsepower with boost function, featuring unique M-specific tuning and torque vectoring capability</li>
                    <li>Massive 1,100 Nm of instant torque available in Sport mode, enabled by advanced power electronics and thermal management system</li>
                    <li>Exceptional performance metrics including 0-100 km/h acceleration in just 3.8 seconds, with launch control and M-specific xDrive calibration for optimal traction</li>
                    <li>Extended range of 566 km (WLTP) thanks to a 111.5 kWh battery pack featuring the latest NMC chemistry and advanced thermal management</li>
                    <li>State-of-the-art charging capabilities with 200kW DC fast charging, allowing 10-80% charge in just 35 minutes, complemented by intelligent route planning with charging stop optimization</li>
                </ul>
                <p>The vehicle is equipped with next-generation battery technology featuring DC fast charging up to 200kW, enabling charging from 10% to 80% in 35 minutes. Interior is finished with premium materials and the BMW Curved Display.</p>',
                'image' => 'news_events/bmw-ix-m60.png',
                'date' => Carbon::now()->subDays(4),
                'is_active' => true,
            ],
            [
                'title' => 'Audi RS e-tron GT 2024 Launches in Vietnam',
                'content' => '<p>Audi Vietnam officially launches the electric sports car RS e-tron GT 2024 with premium features:</p>
                <ul>
                    <li>Advanced dual electric motor powertrain delivering a combined output of 637 horsepower with overboost function, featuring unique RS-specific motor mapping and thermal optimization</li>
                    <li>Sophisticated three-chamber adaptive air suspension system with electronic damping control, offering five distinct ride height settings and RS-specific suspension calibration</li>
                    <li>Next-generation 12.3-inch curved OLED driver display with RS-specific graphics, featuring augmented reality navigation and advanced driver assistance visualization</li>
                    <li>Premium 16-speaker Bang & Olufsen 3D sound system delivering 710 watts of power, with sound optimization based on vehicle speed and ambient noise</li>
                    <li>High-performance 800V electrical architecture enabling ultra-fast DC charging up to 270kW, allowing 100km of range in just 5 minutes of charging</li>
                </ul>
                <p>The vehicle is distributed with prices starting from 6.5 billion VND, including 3-year warranty and complimentary maintenance package for the first 5 years.</p>',
                'image' => 'news_events/audi-rs-etron.png',
                'date' => Carbon::now()->subDays(6),
                'is_active' => true,
            ],
            [
                'title' => 'Porsche Cayenne 2024 - Comprehensive Upgrade',
                'content' => '<p>Porsche has introduced the upgraded version of Cayenne with notable improvements:</p>
                <ul>
                    <li>Completely redesigned exterior featuring HD Matrix LED headlights with 32,768 individually controllable pixels per headlight, enabling precise light distribution and adaptive beam patterns</li>
                    <li>Premium interior upgrade with hand-stitched leather upholstery, new curved driver display, and haptic feedback controls, complemented by ambient lighting with 64 colors</li>
                    <li>Advanced plug-in hybrid powertrain delivering up to 90 km of pure electric range, featuring a new 25.9 kWh battery pack and intelligent energy management system</li>
                    <li>State-of-the-art Burmester 4D surround sound system with 21 precisely positioned speakers and resonators in the seats for immersive audio experience</li>
                    <li>Latest generation Porsche Active Suspension Management (PASM) with two-valve damper technology, offering enhanced comfort and dynamic performance</li>
                </ul>
                <p>Notably, the new Turbo E-Hybrid version produces up to 729 horsepower, making it the most powerful Cayenne ever.</p>',
                'image' => 'news_events/porsche-cayenne.png',
                'date' => Carbon::now()->subDays(8),
                'is_active' => true,
            ],
            [
                'title' => 'Lexus LM 2024 - New Definition of Luxury MPV',
                'content' => '<p>Lexus officially introduces the luxury MPV LM 2024 with premium features:</p>
                <ul>
                    <li>Ultra-luxurious 4-seat VIP configuration featuring power-adjustable Ottoman seats with memory function, heating, ventilation, and advanced posture optimization system</li>
                    <li>Revolutionary 7-mode massage system incorporating acoustic wave technology and shiatsu techniques, with personalized pressure settings and automatic body scanning</li>
                    <li>Premium entertainment system with 23-inch 4K resolution display, featuring HDMI input, wireless screen mirroring, and built-in streaming services through 5G connectivity</li>
                    <li>Advanced air purification system with nanoe X technology, generating millions of hydroxyl radicals for active air cleaning and deodorization</li>
                    <li>Acoustic glass and active noise control system creating an ultra-quiet cabin environment with less than 63 dB noise level at highway speeds</li>
                </ul>
                <p>The vehicle is equipped with a 2.5L hybrid engine for fuel efficiency, combined with 8-speed automatic transmission and AVS adaptive suspension system.</p>',
                'image' => 'news_events/lexus-lm.png',
                'date' => Carbon::now()->subDays(10),
                'is_active' => true,
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
