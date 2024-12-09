<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computers = DB::table('computers')->pluck('id'); // Lấy danh sách ID máy tính

        for ($i = 0; $i < 100; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computers), // Chọn một ID máy tính ngẫu nhiên
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTime,
                'description' => $faker->paragraph,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}