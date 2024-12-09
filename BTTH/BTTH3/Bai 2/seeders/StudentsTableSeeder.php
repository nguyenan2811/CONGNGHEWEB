<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date('Y-m-d', '2003-01-01'), // Giới hạn độ tuổi từ 1 đến 20
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $faker->numberBetween(1, 100), // Giả định rằng có 100 lớp
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}