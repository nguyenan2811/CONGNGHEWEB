<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i<100;$i++){
            DB::table('cinemas')->insert([
                'name'=>$faker->randomElement(['Lotte', 'CGV', 'BHD', 'Meta']),
                'location'=>$faker->address,
                'total_seats'=>$faker->numberBetween(100,300),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
