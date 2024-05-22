<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            [
                'name' => 'Naveed Lihazi',
                'email' => 'naveed@email.com',
                'phone' => '01512123232',
                'company' => 'Teligati Technologies',
                'address' => 'Hajaribag, Dhaka',
                'product' => 'Cordacriptine Mardipine',
                'description' => 'This is some comment about the supplier and is updated too',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kazi Tasrif',
                'email' => 'kazi@gmail.com',
                'phone' => '01312311231',
                'company' => 'Kazi Pharmaceuticals',
                'address' => 'Dhanmondi, Dhaka',
                'product' => 'Test drug',
                'description' => 'This is a test of the supplier',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tanzir Mannan Tuezo',
                'email' => 'turzo@gmail.com',
                'phone' => '01717391739',
                'company' => 'Turzo Pharmaceuticals',
                'address' => 'Mohammadpur, Dhaka',
                'product' => 'Abilify',
                'description' => 'This is test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('suppliers')->insert($suppliers);
    }
}
