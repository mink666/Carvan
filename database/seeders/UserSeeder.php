<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@carvan.com',
            'name' => 'CarVan Admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'agent1',
            'email' => 'agent1@carvan.com',
            'name' => 'Agent One',
            'password' => Hash::make('agent100'),
            'role' => 'sale',
        ]);
        User::create([
            'username' => 'agent2',
            'email' => 'agent2@carvan.com',
            'name' => 'Agent Two',
            'password' => Hash::make('agent200'),
            'role' => 'sale',
        ]);

    }
}
