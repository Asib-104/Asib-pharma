<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tramadol Category', '2021-06-15 14:39:34', '2021-06-21 21:04:31'),
(2, 'Another Test', '2021-06-16 11:33:55', '2021-06-16 16:35:40');*/
        $categories = [
            [
                'name' => 'Tramadol Category',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Another Test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
