<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sử dụng Faker để tạo dữ liệu giả
        $faker = \Faker\Factory::create();

        // Tạo 100 bản ghi cho bảng `libraries`
        for ($i = 0; $i < 100; $i++) {
            DB::table('libraries')->insert([
                'name' => $faker->company() . ' Library', // Tên thư viện
                'address' => $faker->address(),           // Địa chỉ
                'contact_number' => $faker->phoneNumber(), // Số điện thoại liên hệ
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
