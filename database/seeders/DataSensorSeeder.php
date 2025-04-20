<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Hash;

class DataSensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sensor_data')->insert([
            [
                'suhu' => 37.8,
                'kelembaban' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 36.8,
                'kelembaban' => 59,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 37.8,
                'kelembaban' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 38.8,
                'kelembaban' => 59,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 39.8,
                'kelembaban' => 61,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 40.2,
                'kelembaban' => 63,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 32.8,
                'kelembaban' => 62,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 38.8,
                'kelembaban' => 59,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 39.8,
                'kelembaban' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 40.2,
                'kelembaban' => 61,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suhu' => 37.8,
                'kelembaban' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            
        ]);
    
    }
}
