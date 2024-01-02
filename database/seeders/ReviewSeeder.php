<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'business_id' => Business::where('name', 'The Victoria Riding School')->first()->id,
                'user_id' => User::where('email', 'kole@mail.com')->first()->id,
                'grade' => 4,
                'title' => 'I like it',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla id dolor eget sodales. Curabitur vehicula nisi id lacus fringilla, vel imperdiet augue auctor. Nullam nec tincidunt nisi, eu feugiat purus.',
            ],
            [
                'business_id' => Business::where('name', 'The Victoria Riding School')->first()->id,
                'user_id' => User::where('email', 'david@mail.com')->first()->id,
                'grade' => 5,
                'title' => 'Its good',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla id dolor eget sodales. Curabitur vehicula nisi id lacus fringilla, vel imperdiet augue auctor. Nullam nec tincidunt nisi, eu feugiat purus.',
            ],
            [
                'business_id' => Business::where('name', 'TechVentures Electronics')->first()->id,
                'user_id' => User::where('email', 'kole@mail.com')->first()->id,
                'grade' => 2,
                'title' => 'Good food',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla id dolor eget sodales. Curabitur vehicula nisi id lacus fringilla, vel imperdiet augue auctor. Nullam nec tincidunt nisi, eu feugiat purus.',
            ],
        ]);
    }
}
