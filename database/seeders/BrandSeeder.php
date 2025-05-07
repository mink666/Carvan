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
                    'year' => '1937',
                    'description' => 'Toyota is a Japanese multinational automotive manufacturer headquartered in Toyota City, Aichi, Japan.',
                    'logo' => 'images/logos/toyota_logo.png',
                    'location' => 'Aichi, Japan',
                ],
                [
                    'name' => 'Honda',
                    'year' => '1948',
                    'description' => 'Honda is a Japanese public multinational conglomerate known for manufacturing automobiles, motorcycles, and power equipment.',
                    'logo' => 'images/logos/honda_logo.png',
                    'location' => 'Tokyo, Japan',
                ],
                [
                    'name' => 'Ford',
                    'year' => '1903',
                    'description' => 'Ford Motor Company is an American multinational automaker headquartered in Dearborn, Michigan.',
                    'logo' => 'images/logos/ford_logo.png',
                    'location' => 'Michigan, USA',
                ],
                [
                    'name' => 'Hyundai',
                    'year' => '1967',
                    'description' => 'Hyundai Motor Company is a South Korean multinational automotive manufacturer headquartered in Seoul.',
                    'logo' => 'images/logos/hyundai_logo.png',
                    'location' => 'Seoul, South Korea',
                ],
        ];

        foreach ($brands as $brandData) {
            Brand::firstOrCreate(['name' => $brandData['name']], $brandData);
        }
    }
}
