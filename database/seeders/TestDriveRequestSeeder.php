<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TestDriveRequest;
use Illuminate\support\Facades\DB;
use Carbon\Carbon;

class TestDriveRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('test_drive_requests')->insert([
            [
                'car_model_id' => 1,
                'email_address' => 'nguyen.an@example.com',
                'first_name' => 'Nguyen',
                'last_name' => 'An',
                'note' => 'Customer wants to test drive the car',
                'phone_number' => '0901234567',
                'request_date' => Carbon::parse('2025-05-18'),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_model_id' => 2,
                'email_address' => 'tran.binh@example.com',
                'first_name' => 'Tran',
                'last_name' => 'Binh',
                'note' => 'Customer is interested in the new model',
                'phone_number' => '0907654321',
                'request_date' => Carbon::parse('2025-05-19'),
                'status' => 'processed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_model_id' => 3,
                'email_address' => 'le.cuong@example.com',
                'first_name' => 'Le',
                'last_name' => 'Cuong',
                'note' => 'Not sure about the model, needs more information',
                'phone_number' => '0912345678',
                'request_date' => Carbon::parse('2025-05-17'),
                'status' => 'cancelled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
