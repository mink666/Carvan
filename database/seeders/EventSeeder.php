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
                    <li>Over 100 latest models from premium brands</li>
                    <li>Electric and autonomous vehicle technology experience zone</li>
                    <li>Classic and modified car exhibition</li>
                    <li>Workshops and talkshows on automotive technology trends</li>
                </ul>
                <p>Visitors will have the opportunity to test drive the latest models and participate in exclusive promotional programs at the exhibition.</p>',
                // 'image' => 'events/auto-show-2024.jpg',
                'start_date' => Carbon::now()->addMonths(2),
                'end_date' => Carbon::now()->addMonths(2)->addDays(7),
            ],
            [
                'title' => 'Mercedes-Benz Driving Experience 2024 - Hanoi',
                'content' => '<p>Special driving experience program from Mercedes-Benz including:</p>
                <ul>
                    <li>Experience the complete latest AMG lineup</li>
                    <li>Safe driving training with international experts</li>
                    <li>Off-road challenges with SUV models</li>
                    <li>Level 3 autonomous driving technology experience</li>
                </ul>
                <p>Event limited to 100 participants, priority given to VIP customers and Mercedes-Benz owners.</p>',
                // 'image' => 'events/mercedes-experience.jpg',
                'start_date' => Carbon::now()->addDays(15),
                'end_date' => Carbon::now()->addDays(17),
            ],
            [
                'title' => 'BMW M Track Day 2024 - Dai Nam Circuit',
                'content' => '<p>Experience day for BMW M high-performance vehicles with activities:</p>
                <ul>
                    <li>Test drive latest BMW M models on the track</li>
                    <li>Professional sports driving technique workshop</li>
                    <li>Drift and gymkhana demonstrations by professional drivers</li>
                    <li>Networking with BMW M owners community</li>
                </ul>
                <p>Event features experts from BMW M GmbH and BMW Vietnam technical team.</p>',
                // 'image' => 'events/bmw-track-day.jpg',
                'start_date' => Carbon::now()->addDays(45),
                'end_date' => Carbon::now()->addDays(45),
            ],
            [
                'title' => 'Audi Tech Innovation Day 2024 - Ho Chi Minh City',
                'content' => '<p>Event showcasing latest Audi technologies, focusing on:</p>
                <ul>
                    <li>Launch of the latest e-tron electric vehicles</li>
                    <li>Autonomous driving and smart connectivity demonstrations</li>
                    <li>Matrix LED and OLED lighting technology exhibition</li>
                    <li>Introduction to next-generation PPE platform</li>
                </ul>
                <p>Visitors will tour the technology showroom and experience the latest features firsthand.</p>',
                // 'image' => 'events/audi-tech-day.jpg',
                'start_date' => Carbon::now()->addDays(5),
                'end_date' => Carbon::now()->addDays(5),
            ],
            [
                'title' => 'Porsche Festival 2024 - 75th Anniversary',
                'content' => '<p>Annual festival for Porsche enthusiasts featuring:</p>
                <ul>
                    <li>Classic Porsche collection exhibition from 1950-2000</li>
                    <li>Launch of the new Porsche 911 GT3 RS</li>
                    <li>Porsche Heritage photography competition</li>
                    <li>Networking with Porsche Club Vietnam</li>
                </ul>
                <p>Event includes Porsche Design area with exclusive and limited edition products available only during the festival.</p>',
                // 'image' => 'events/porsche-festival.jpg',
                'start_date' => Carbon::now()->addMonths(3),
                'end_date' => Carbon::now()->addMonths(3)->addDays(2),
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
