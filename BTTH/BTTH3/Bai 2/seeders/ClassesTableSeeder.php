<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('classes')->insert([
            'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']),
            'room_number' => $faker->unique()->bothify('Room-##'), // Tạo số phòng như "Room-12"
            'created_at' => now(), // Ngày giờ hiện tại
            'updated_at' => now(),
            ]);
    }
}
