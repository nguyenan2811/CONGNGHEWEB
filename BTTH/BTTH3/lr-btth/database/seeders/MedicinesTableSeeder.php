<?php

namespace Database\Seeders;

// use DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
        DB::table("medicines")->insert([
            'name' => $faker->word,
            'brand' => $faker->word,
            'dosage' => $faker->word,
            'form' => $faker->word,
            'price' => $faker->randomFloat(2, 1, 100),
            'stock' => $faker->numberBetween(1, 100),
        ]);
    }
    }
}