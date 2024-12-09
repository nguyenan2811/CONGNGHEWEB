<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 100; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3), // Tên phim
                'director' => $faker->name(), // Đạo diễn
                'release_date' => $faker->date(), // Ngày phát hành
                'duration' => $faker->numberBetween(90, 180), // Thời lượng phim (90-180 phút)
                'cinema_id' => $faker->numberBetween(1, 3), // Mã rạp chiếu (tham chiếu đến bảng cinemas)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
