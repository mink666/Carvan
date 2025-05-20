<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RangeOfCar; // Đảm bảo đã import Model RangeOfCar

class RangeOfCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $ranges = [
            [
                'name' => 'Sedan',
                'description' => 'Elegant and comfortable four-door passenger cars, ideal for families and executive travel. Known for their balanced ride and sophisticated styling.',
                'is_active' => true, // Thêm dòng này
            ],
            [
                'name' => 'SUV (Sport Utility Vehicle)',
                'description' => 'Versatile vehicles offering a combination of passenger car-like comfort with off-road capabilities and higher ground clearance. Perfect for adventure and family utility.',
                'is_active' => true, // Thêm dòng này
            ],
            [
                'name' => 'Hatchback',
                'description' => 'Compact and practical cars featuring a rear hatch instead of a trunk, offering flexible cargo space and city-friendly maneuverability.',
                'is_active' => true, // Thêm dòng này
            ],
            [
                'name' => 'Pickup Truck',
                'description' => 'Rugged vehicles with an open cargo bed, designed for hauling, towing, and off-road performance. Ideal for work and recreational activities.',
                'is_active' => true, // Thêm dòng này
            ],
            [
                'name' => 'Coupe',
                'description' => 'Sporty two-door cars characterized by a sleek, sloping roofline, often emphasizing performance and styling over practicality.',
                'is_active' => true, // Thêm dòng này
            ],
            [
                'name' => 'Convertible (Cabriolet)',
                'description' => 'Cars with a retractable roof, offering an open-air driving experience. Perfect for scenic drives and enjoying the weather.',
                'is_active' => true, // Thêm dòng này
            ],
            [
                'name' => 'MPV (Multi-Purpose Vehicle)',
                'description' => 'Spacious and flexible vehicles designed to carry multiple passengers, often with configurable seating and ample cargo room. Ideal for large families.',
                'is_active' => true, // Thêm dòng này
            ],
            [
                'name' => 'Sports Car',
                'description' => 'High-performance vehicles designed for exhilarating driving dynamics, speed, and agile handling, often with a focus on aerodynamics and powerful engines.',
                'is_active' => true, // Thêm dòng này
            ],
            [
                'name' => 'Electric Vehicle (EV)',
                'description' => 'Vehicles powered by electricity, offering zero tailpipe emissions, instant torque, and a focus on sustainable mobility.',
                'is_active' => true, // Thêm dòng này
            ],
            [
                'name' => 'Hybrid',
                'description' => 'Vehicles that combine a conventional internal combustion engine with an electric motor, offering improved fuel efficiency and reduced emissions.',
                'is_active' => false, // Đặt là false cho mục cuối cùng
            ]
        ];

        foreach ($ranges as $rangeData) {
            RangeOfCar::updateOrCreate(
                ['name' => $rangeData['name']], 
                $rangeData
            );
        }
    }
}
