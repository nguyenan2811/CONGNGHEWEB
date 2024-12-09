<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sử dụng Faker để tạo dữ liệu giả
        $faker = Faker::create();

        // Tạo 100 bản ghi cho bảng `books`
        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3), // Tạo tên sách ngẫu nhiên
                'author' => $faker->name, // Tạo tên tác giả ngẫu nhiên
                'publication_year' => $faker->year, // Tạo năm xuất bản ngẫu nhiên
                'genre' => $faker->word, // Tạo thể loại sách ngẫu nhiên
                'library_id' => $faker->numberBetween(1, 10), // Liên kết ngẫu nhiên đến thư viện (Giả sử có 10 thư viện)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
