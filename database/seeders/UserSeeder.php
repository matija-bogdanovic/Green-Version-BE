<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'David Milenkovic',
                'email' => 'david@mail.com',
                'password' => bcrypt('Admin123!'),
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Nikola Radojkovic',
                'email' => 'kole@mail.com',
                'password' => bcrypt('Admin123!'),
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Danijel Radojkovic',
                'email' => 'deni@mail.com',
                'password' => bcrypt('Admin123!'),
                'email_verified_at' => Carbon::now()
            ],
        ]);
    }
}
