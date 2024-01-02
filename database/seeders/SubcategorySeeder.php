<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategories')->insert([
            [
                'name' => 'Equestrian',
                'category_id' =>  Category::where('name', 'Country sport')->first()->id,
            ],
            [
                'name' => 'Fishing',
                'category_id' =>  Category::where('name', 'Country sport')->first()->id,
            ],
            [
                'name' => 'Hunting',
                'category_id' =>  Category::where('name', 'Country sport')->first()->id,
            ],
            [
                'name' => 'Golf',
                'category_id' =>  Category::where('name', 'Country sport')->first()->id,
            ],
            [
                'name' => 'Shooting',
                'category_id' =>  Category::where('name', 'Country sport')->first()->id,
            ],

            [
                'name' => 'Farms',
                'category_id' =>  Category::where('name', 'Agriculture')->first()->id,
            ],
            [
                'name' => 'Markets',
                'category_id' =>  Category::where('name', 'Agriculture')->first()->id,
            ],
            [
                'name' => 'Machinery',
                'category_id' =>  Category::where('name', 'Agriculture')->first()->id,
            ],
            [
                'name' => 'Accessories',
                'category_id' =>  Category::where('name', 'Agriculture')->first()->id,
            ],

            [
                'name' => 'Flowers',
                'category_id' =>  Category::where('name', 'Horticulture')->first()->id,
            ],
            [
                'name' => 'Plants',
                'category_id' =>  Category::where('name', 'Horticulture')->first()->id,
            ],
            [
                'name' => 'Edible plants',
                'category_id' =>  Category::where('name', 'Horticulture')->first()->id,
            ],

            [
                'name' => 'Flowers',
                'category_id' =>  Category::where('name', 'Travel & Accommodation')->first()->id,
            ],
            [
                'name' => 'Plants',
                'category_id' =>  Category::where('name', 'Travel & Accommodation')->first()->id,
            ],
            [
                'name' => 'Edible plants',
                'category_id' =>  Category::where('name', 'Travel & Accommodation')->first()->id,
            ],

            [
                'name' => 'Property',
                'category_id' =>  Category::where('name', 'Services')->first()->id,
            ],
            [
                'name' => 'Photography',
                'category_id' =>  Category::where('name', 'Services')->first()->id,
            ],
            [
                'name' => 'Interiors',
                'category_id' =>  Category::where('name', 'Services')->first()->id,
            ],

            [
                'name' => 'Fashion',
                'category_id' =>  Category::where('name', 'Fashion & Apparel')->first()->id,
            ],
            [
                'name' => 'Accessories',
                'category_id' =>  Category::where('name', 'Fashion & Apparel')->first()->id,
            ],
            [
                'name' => 'Apparel',
                'category_id' =>  Category::where('name', 'Fashion & Apparel')->first()->id,
            ],

            [
                'name' => 'Restaurants',
                'category_id' =>  Category::where('name', 'Food & Drink')->first()->id,
            ],
            [
                'name' => 'Markets',
                'category_id' =>  Category::where('name', 'Food & Drink')->first()->id,
            ],
            [
                'name' => 'Wine tasting',
                'category_id' =>  Category::where('name', 'Food & Drink')->first()->id,
            ],
            [
                'name' => 'Pubs',
                'category_id' =>  Category::where('name', 'Food & Drink')->first()->id,
            ],

            [
                'name' => 'Art & Antiques',
                'category_id' =>  Category::where('name', 'Things to do')->first()->id,
            ],
            [
                'name' => 'Architecture',
                'category_id' =>  Category::where('name', 'Things to do')->first()->id,
            ],
            [
                'name' => 'Shopping',
                'category_id' =>  Category::where('name', 'Things to do')->first()->id,
            ],
        ]);
    }
}
