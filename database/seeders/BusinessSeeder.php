<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('businesses')->insert([
            [
                'user_id' => User::where('email', 'deni@mail.com')->first()->id,
                'name' => 'The Victoria Riding School',
                'email' => 'riding-school@mail.com',
                'phone' => '+381694400605',
                'site' => 'https://upfoxstudio.com/',
                'about' => 'The Victoria is a restaurant of traditional cuisine that has maintained the values ​​of old British cuisine for generations and provides the best for its guests, our mission is that every guest is satisfied and takes.',
            ],
            [
                'user_id' => User::where('email', 'mata@mail.com')->first()->id,
                'name' => 'TechVentures Electronics',
                'email' => 'contact@techventures.com',
                'phone' => '+442039876543',
                'site' => 'https://techventures.com/',
                'about' => 'TechVentures Electronics is a leading retailer in cutting-edge electronic goods, specializing in personal computing and smart home technology. Our goal is to bring the latest innovations to consumers with exceptional customer service.',
            ],
            [
                'user_id' => User::where('email', 'deni@mail.com')->first()->id,
                'name' => 'GreenGrowth Nurseries',
                'email' => 'info@greengrowth.com',
                'phone' => '+353859684321',
                'site' => 'https://greengrowthnurseries.com/',
                'about' => 'GreenGrowth Nurseries offers a wide variety of plants and gardening supplies. Committed to sustainable gardening, we provide organic options and expert advice to help you create your perfect green space.',
            ],
            [
                'user_id' => User::where('email', 'mata@mail.com')->first()->id,
                'name' => 'ArtWorld Gallery',
                'email' => 'gallery@artworldgallery.com',
                'phone' => '+18005551234',
                'site' => 'https://artworldgallery.com/',
                'about' => 'ArtWorld Gallery is a contemporary art space showcasing diverse works from emerging and established artists. We aim to make art accessible to all and host regular exhibitions and workshops for the community.',
            ],
        ]);




        DB::table('business_adresses')->insert([
            [
                'business_id' => Business::where('name', 'The Victoria Riding School')->first()->id,
                'name' => 'Alexander & Co. Estates',
                'locality' => 'Brookside',
                'pincode' => 'AB12 3CD',
                'city' => 'Newcastleton',
                'landmark' => 'Near the Old Willow Tree',
                'state' => 'Northumberland',
                'address' => ' 42 Sterling Avenue',
            ],
            [
                'business_id' => Business::where('name', 'TechVentures Electronics')->first()->id,
                'name' => 'Gadget Hub Office',
                'locality' => 'Innovation Quarter',
                'pincode' => 'EC1A 1BB',
                'city' => 'London',
                'landmark' => 'Next to Tech City',
                'state' => 'Greater London',
                'address' => '22 Silicon Way',
            ],
            [
                'business_id' => Business::where('name', 'GreenGrowth Nurseries')->first()->id,
                'name' => 'The Greenhouse Complex',
                'locality' => 'West End',
                'pincode' => 'GL20 5TT',
                'city' => 'Bristol',
                'landmark' => 'Beside the Royal Gardens',
                'state' => 'South West England',
                'address' => '47 Garden Lane',
            ],
            [
                'business_id' => Business::where('name', 'ArtWorld Gallery')->first()->id,
                'name' => 'Canvas and Color Studios',
                'locality' => 'Cultural District',
                'pincode' => 'M4 5AH',
                'city' => 'Manchester',
                'landmark' => 'Near Manchester Art Museum',
                'state' => 'Greater Manchester',
                'address' => '15 Artisan Avenue',
            ],
            [
                'business_id' => Business::where('name', 'The Victoria Riding School')->first()->id,
                'name' => 'Equestrian Manor',
                'locality' => 'Rural Edge',
                'pincode' => 'NE66 4LN',
                'city' => 'Alnwick',
                'landmark' => 'Close to Alnwick Castle',
                'state' => 'Northumberland',
                'address' => '3 Horseman Road',
            ],
            [
                'business_id' => Business::where('name', 'TechVentures Electronics')->first()->id,
                'name' => 'Innovate Workspace',
                'locality' => 'Tech Park',
                'pincode' => 'CB2 1RP',
                'city' => 'Cambridge',
                'landmark' => 'Adjacent to Science Park',
                'state' => 'Cambridgeshire',
                'address' => '88 Innovation Drive',
            ],
            [
                'business_id' => Business::where('name', 'GreenGrowth Nurseries')->first()->id,
                'name' => 'Verdant Views',
                'locality' => 'Greenfield Area',
                'pincode' => 'BS8 2LG',
                'city' => 'Bristol',
                'landmark' => 'Next to Botanic Garden',
                'state' => 'South West England',
                'address' => '35 Plantation Street',
            ],
        ]);
    }
}
