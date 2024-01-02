<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('amenities')->insert([
            [
                'name' => 'Swimming pool',
                'icon' => 'public/icons/Pool.svg',
                'type' => 'highlighted',
            ],
            [
                'name' => 'Vehicle rentals',
                'icon' => 'public/icons/vehicle.svg',
                'type' => 'highlighted',
            ],
            [
                'name' => 'Restaurant',
                'icon' => 'public/icons/Pool.svg',
                'type' => 'highlighted',
            ],
            [
                'name' => 'Bar',
                'icon' => 'public/icons/bar.svg',
                'type' => 'highlighted',
            ],
            [
                'name' => '24 hour room services',
                'icon' => 'public/icons/rs.svg',
                'type' => 'highlighted',
            ],

            [
                'name' => 'Swimming pool',
                'icon' => '',
                'type' => 'basic',
            ],
            [
                'name' => 'Smoking rooms',
                'icon' => '',
                'type' => 'basic',
            ],
            [
                'name' => 'Restaurant',
                'icon' => '',
                'type' => 'basic',
            ],
            [
                'name' => 'Bar',
                'icon' => '',
                'type' => 'basic',
            ],
            [
                'name' => 'Good for kids',
                'icon' => '',
                'type' => 'basic',
            ],
        ]);
    }
}
