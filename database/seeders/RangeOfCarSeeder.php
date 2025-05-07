<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RangeOfCar;

class RangeOfCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ranges = [
            ['name' => 'Sedan', 'description' => 'A sedan is a passenger car in a three-box configuration with separate compartments for engine, passenger, and cargo.'],
            ['name' => 'SUV', 'description' => 'An SUV (Sport Utility Vehicle) is a larger vehicle that combines elements of road-going passenger cars with off-road vehicles.'],
            ['name' => 'Truck', 'description' => 'A truck is a motor vehicle designed primarily for transporting cargo.'],
            ['name' => 'Coupe', 'description' => 'A coupe is a passenger car with a fixed-roof body style that is shorter than a sedan.'],
            ['name' => 'Hatchback', 'description' => 'A hatchback is a car design featuring a rear door that swings upwards, providing access to the car\'s interior.'],
        ];

        foreach ($ranges as $rangeData) {
            RangeOfCar::firstOrCreate(['name' => $rangeData['name']], $rangeData);
        }
    }
}
