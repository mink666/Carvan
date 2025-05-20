<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Vietnam International Auto Show 2024 - Phase 1',
                'content' => '<p>The largest auto show in Vietnam featuring more than 15 leading global car brands. The event will showcase:</p>
                <ul>
                    <li>Over 100 latest models from premium brands including Mercedes-Benz, BMW, Audi, Porsche, and Lexus, with special focus on their flagship models and limited editions</li>
                    <li>Dedicated electric vehicle zone featuring the latest EVs from Tesla, Porsche Taycan, Audi e-tron, and BMW i series, with interactive displays explaining charging infrastructure and battery technology</li>
                    <li>Heritage exhibition showcasing 50 classic cars from 1950-1990, including rare vintage Mercedes-Benz, Porsche, and BMW models from private collectors</li>
                    <li>Innovation hub with cutting-edge automotive technologies including autonomous driving demonstrations, advanced driver assistance systems, and next-generation infotainment systems</li>
                    <li>Exclusive VIP preview sessions with chief designers and engineers from various automotive brands discussing future mobility trends</li>
                </ul>
                <p>Visitors will have the opportunity to test drive the latest models and participate in exclusive promotional programs at the exhibition.</p>',
                'image' => 'news_events/auto-show-2024.jpg',
                'start_date' => Carbon::now()->addMonths(2),
                'end_date' => Carbon::now()->addMonths(2)->addDays(7),
                'is_active' => true,
            ],
            [
                'title' => 'Mercedes-Benz Driving Experience 2024 - Hanoi',
                'content' => '<p>Special driving experience program from Mercedes-Benz including:</p>
                <ul>
                    <li>Exclusive track experience with the complete 2024 AMG lineup, including the new AMG GT Black Series, AMG GT 63 S E Performance, and AMG C 63 S E Performance</li>
                    <li>Professional driving instruction from AMG Driving Academy experts, covering advanced techniques in handling, braking, and cornering at high speeds</li>
                    <li>Off-road masterclass with the new GLS, G-Class, and GLE featuring obstacle courses, steep inclines, and water crossing challenges</li>
                    <li>First-hand experience with Level 3 autonomous driving in the new S-Class, demonstrating traffic jam pilot and automated parking features</li>
                    <li>Exclusive preview of upcoming Mercedes-EQ electric vehicles with detailed technical presentations from Mercedes-Benz engineers</li>
                </ul>
                <p>Event limited to 100 participants, priority given to VIP customers and Mercedes-Benz owners.</p>',
                'image' => 'news_events/mercedes-experience.jpg',
                'start_date' => Carbon::now()->addDays(15),
                'end_date' => Carbon::now()->addDays(17),
                'is_active' => true,
            ],
            [
                'title' => 'BMW M Track Day 2024 - Dai Nam Circuit',
                'content' => '<p>Experience day for BMW M high-performance vehicles with activities:</p>
                <ul>
                    <li>High-performance track sessions with the new M3 Competition, M4 CSL, M5 CS, and the revolutionary XM Label Red, guided by BMW M certified instructors</li>
                    <li>Advanced driving workshop covering racing lines, threshold braking, heel-and-toe techniques, and performance driving dynamics</li>
                    <li>Professional demonstration of controlled drifting and precision driving by BMW works drivers, featuring the M2 Competition and M4 Competition</li>
                    <li>Technical deep-dive into M-specific technologies including M xDrive, Active M Differential, and M Setup with BMW M engineers</li>
                    <li>Exclusive M Town community gathering with photo opportunities and sharing sessions with fellow M enthusiasts</li>
                </ul>
                <p>Event features experts from BMW M GmbH and BMW Vietnam technical team.</p>',
                'image' => 'news_events/bmw-track-day.jpg',
                'start_date' => Carbon::now()->addDays(45),
                'end_date' => Carbon::now()->addDays(45),
                'is_active' => true,
            ],
            [
                'title' => 'Audi Tech Innovation Day 2024 - Ho Chi Minh City',
                'content' => '<p>Event showcasing latest Audi technologies, focusing on:</p>
                <ul>
                    <li>World premiere of the new Audi Q8 e-tron and RS e-tron GT with detailed presentations on their 800V electrical architecture and advanced battery management systems</li>
                    <li>Live demonstrations of Audi\'s latest autonomous driving capabilities including remote parking pilot, predictive active suspension, and intersection assist</li>
                    <li>Interactive showcase of Audi\'s lighting technology evolution, from Matrix LED to Digital Matrix LED and the revolutionary Digital OLED technology with customizable light signatures</li>
                    <li>Technical workshop on the Premium Platform Electric (PPE) architecture, discussing its advantages in terms of range, charging capabilities, and performance potential</li>
                    <li>Virtual reality experience of Audi\'s future mobility concepts and upcoming vehicle designs using advanced visualization technology</li>
                </ul>
                <p>Visitors will tour the technology showroom and experience the latest features firsthand.</p>',
                'image' => 'news_events/audi-tech-day.jpg',
                'start_date' => Carbon::now()->addDays(5),
                'end_date' => Carbon::now()->addDays(5),
                'is_active' => true,
            ],
            [
                'title' => 'Porsche Festival 2024 - 75th Anniversary',
                'content' => '<p>Annual festival for Porsche enthusiasts featuring:</p>
                <ul>
                    <li>Curated exhibition of 75 iconic Porsche models spanning seven decades, including rare specimens like the 356 Speedster, early 911s, and limited production models like the 959 and Carrera GT</li>
                    <li>Global debut of the new 911 GT3 RS with detailed technical presentations by Porsche GT division engineers on aerodynamics and track capabilities</li>
                    <li>Professional photography exhibition showcasing Porsche\'s racing heritage from Le Mans victories to modern Formula E participation, with a competition for enthusiast photographers</li>
                    <li>Exclusive Porsche Club Vietnam gathering with track day activities, concours d\'elegance competition, and gourmet dining experience</li>
                    <li>Interactive heritage workshop discussing Porsche\'s evolution in design, engineering, and performance over 75 years with Porsche Museum experts</li>
                </ul>
                <p>Event includes Porsche Design area with exclusive and limited edition products available only during the festival.</p>',
                'image' => 'news_events/porsche-festival.jpg',
                'start_date' => Carbon::now()->addMonths(3),
                'end_date' => Carbon::now()->addMonths(3)->addDays(2),
                'is_active' => true,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
