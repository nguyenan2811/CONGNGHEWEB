<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaptopsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Tạo 100 bản ghi cho bảng `laptops`
        for ($i = 0; $i < 100; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->company, // Hãng sản xuất
                'model' => $faker->word, // Mẫu laptop
                'specifications' => $faker->sentence(5), // Thông số kỹ thuật
                'rental_status' => $faker->boolean, // Trạng thái cho thuê
                'renter_id' => $faker->numberBetween(1, 50), // Liên kết ngẫu nhiên đến người thuê (Giả sử có 50 người thuê)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
