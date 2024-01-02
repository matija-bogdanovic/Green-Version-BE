<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoryBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategory_business')->insert([
            [
                'subcategory_id' => Subcategory::where('name', 'Fishing')->first()->id,
                'business_id' =>  Business::where('name', 'The Victoria Riding School')->first()->id,
            ],
            [
                'subcategory_id' => Subcategory::where('name', 'Hunting')->first()->id,
                'business_id' =>  Business::where('name', 'The Victoria Riding School')->first()->id,
            ],

            [
                'subcategory_id' => Subcategory::where('name', 'Fishing')->first()->id,
                'business_id' =>  Business::where('name', 'TechVentures Electronics')->first()->id,
            ],

            [
                'subcategory_id' => Subcategory::where('name', 'Restaurants')->first()->id,
                'business_id' =>  Business::where('name', 'GreenGrowth Nurseries')->first()->id,
            ],
            [
                'subcategory_id' => Subcategory::where('name', 'Pubs')->first()->id,
                'business_id' =>  Business::where('name', 'GreenGrowth Nurseries')->first()->id,
            ],

            [
                'subcategory_id' => Subcategory::where('name', 'Art & Antiques')->first()->id,
                'business_id' =>  Business::where('name', 'ArtWorld Gallery')->first()->id,
            ],
        ]);
    }
}
