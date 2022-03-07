<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  
        $faker = Faker::create('vi_VN');
        DB::table('profiles')->insert([
            'name' => $faker->name,
            'dob' => $faker->date($format = 'Y-m-d', $max = '2020', $min = '1980'),
            'nickname' => $faker->word,
            'username_login' => $faker->word,
            'email' => $faker->unique()->email,
            'description' => $faker->sentence($nbWords = 3, $variableNbWords = true),
            'avatar' => $faker->word,
            'address' => $faker->word,
            'phone' => $faker->phoneNumber,
        ]);
    }
}
