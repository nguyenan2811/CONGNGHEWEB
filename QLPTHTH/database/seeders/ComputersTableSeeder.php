<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách ID của các máy tính đã tạo

        // Tạo 100 bản ghi cho bảng issues
        for ($i = 0; $i < 100; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word() . '-PC' . $faker->numberBetween(1, 99),
                'model' => $faker->word . ' ' . $faker->word,
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu', 'macOS']),
                'processor' => $faker->word . ' ' . $faker->word,
                'memory' => $faker->numberBetween(4, 32),
                'available' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}