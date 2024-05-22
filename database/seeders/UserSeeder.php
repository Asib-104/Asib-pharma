<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user1 = User::create([
            'name' => "Atikur Rahman Asib",
            'email' => "asib@email.com",
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'avatar' => 'asib.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user1->assignRole('super-admin');

        $user2 = User::create([
            'name' => "Efty Hasan",
            'email' => "efty@email.com",
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'avatar' => 'efty.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user2->assignRole('sales-person');
    }
}
