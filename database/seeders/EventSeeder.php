<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $startDate = $faker->dateTimeBetween('now', '+1 year');
            $endDate = $faker->dateTimeBetween($startDate, '+1 year');

            Event::create([
                'title' => $faker->sentence(3),
                'content' => $faker->paragraphs(3, true),
                'start_date' => $startDate,
                'end_date' => $endDate,
                // 'image' => null
            ]);
        }
    }
}
