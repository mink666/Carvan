<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\News::factory(10)->create();

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            News::create([
                'title' => $faker->sentence(3),
                'content' => $faker->paragraphs(3, true),
                'date' => $faker->dateTimeBetween('-1 year', 'now'),
                'image' => null
            ]);
        }
    }
}
