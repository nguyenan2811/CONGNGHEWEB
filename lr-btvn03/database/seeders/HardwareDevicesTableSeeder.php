<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HardwareDevicesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Tạo 50 bản ghi cho bảng `hardware_devices`
        for ($i = 0; $i < 100; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word, // Tên thiết bị
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']), // Loại thiết bị
                'status' => $faker->boolean, // Trạng thái hoạt động
                'center_id' => $faker->numberBetween(1, 10), // Liên kết ngẫu nhiên đến trung tâm (Giả sử có 10 trung tâm)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
