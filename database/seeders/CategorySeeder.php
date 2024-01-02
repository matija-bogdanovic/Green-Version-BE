<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Country sport',
                'icon' => 'public/icons/trophy.svg',
                'slug' => 'country-sport'
            ],
            [
                'name' => 'Agriculture',
                'icon' => 'public/icons/grains.svg',
                'slug' => 'agriculture'
            ],
            [
                'name' => 'Horticulture',
                'icon' => 'public/icons/plant.svg',
                'slug' => 'horticulture',
            ],
            [
                'name' => 'Travel & Accommodation',
                'icon' => 'public/icons/bed.svg',
                'slug' => 'travel-and-accommodation'
            ],
            [
                'name' => 'Services',
                'icon' => 'public/icons/instalogo.svg',
                'slug' => 'services'
            ],
            [
                'name' => 'Fashion & Apparel',
                'icon' => 'public/icons/dress.svg',
                'slug' => 'fashion-and-apparel'
            ],
            [
                'name' => 'Food & Drink',
                'icon' => 'public/icons/bar.svg',
                'slug' => 'food-and-drink'
            ],
            [
                'name' => 'Things to do',
                'icon' => 'public/icons/building.svg',
                'slug' => 'things-to-do'
            ]
        ]);
    }
}
