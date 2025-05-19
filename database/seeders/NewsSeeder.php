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
                    <li>New generation MBUX infotainment system with 12.8-inch OLED display</li>
                    <li>Level 3 autonomous driving system allowing hands-free operation under certain conditions</li>
                    <li>Digital Light technology with over 2.6 million pixels per headlight</li>
                    <li>Premium seat massage feature with 10 different programs</li>
                </ul>
                <p>The vehicle is expected to be available in Vietnam market in Q3 2024 with 3 versions: S450 4MATIC, S500 4MATIC, and S580 4MATIC.</p>',
                'image' => 'news_events/mercedes-sclass-2024.jpg',
                'date' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'BMW iX M60 2024 - Perfect Blend of Performance and Luxury',
                'content' => '<p>BMW has introduced the high-performance electric vehicle iX M60 2024 with impressive specifications:</p>
                <ul>
                    <li>Maximum power output of 619 horsepower</li>
                    <li>Peak torque of 1,100 Nm</li>
                    <li>0-100 km/h acceleration in 3.8 seconds</li>
                    <li>Operating range up to 566 km</li>
                </ul>
                <p>The vehicle is equipped with next-generation battery technology featuring DC fast charging up to 200kW, enabling charging from 10% to 80% in 35 minutes. Interior is finished with premium materials and the BMW Curved Display.</p>',
                'image' => 'news_events/bmw-ix-m60.jpg',
                'date' => Carbon::now()->subDays(4),
            ],
            [
                'title' => 'Audi RS e-tron GT 2024 Launches in Vietnam',
                'content' => '<p>Audi Vietnam officially launches the electric sports car RS e-tron GT 2024 with premium features:</p>
                <ul>
                    <li>Dual electric motors delivering combined 637 horsepower</li>
                    <li>Standard adaptive air suspension system</li>
                    <li>12.3-inch curved OLED driver display</li>
                    <li>16-speaker Bang & Olufsen sound system</li>
                </ul>
                <p>The vehicle is distributed with prices starting from 6.5 billion VND, including 3-year warranty and complimentary maintenance package for the first 5 years.</p>',
                'image' => 'news_events/audi-rs-etron.jpg',
                'date' => Carbon::now()->subDays(6),
            ],
            [
                'title' => 'Porsche Cayenne 2024 - Comprehensive Upgrade',
                'content' => '<p>Porsche has introduced the upgraded version of Cayenne with notable improvements:</p>
                <ul>
                    <li>New exterior design with HD Matrix LED headlights</li>
                    <li>Refreshed interior with higher quality materials</li>
                    <li>Hybrid version with electric range up to 90 km</li>
                    <li>Burmester 4D sound system with 21 speakers</li>
                </ul>
                <p>Notably, the new Turbo E-Hybrid version produces up to 729 horsepower, making it the most powerful Cayenne ever.</p>',
                'image' => 'news_events/porsche-cayenne.jpg',
                'date' => Carbon::now()->subDays(8),
            ],
            [
                'title' => 'Lexus LM 2024 - New Definition of Luxury MPV',
                'content' => '<p>Lexus officially introduces the luxury MPV LM 2024 with premium features:</p>
                <ul>
                    <li>4-seat VIP configuration with power-adjustable Ottoman seats</li>
                    <li>7-mode massage system with acoustic wave technology</li>
                    <li>23-inch 4K resolution entertainment display</li>
                    <li>nanoe X air purification system with negative ions</li>
                </ul>
                <p>The vehicle is equipped with a 2.5L hybrid engine for fuel efficiency, combined with 8-speed automatic transmission and AVS adaptive suspension system.</p>',
                'image' => 'news_events/lexus-lm.jpg',
                'date' => Carbon::now()->subDays(10),
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
