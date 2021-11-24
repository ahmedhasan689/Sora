<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'country_name' => 'Gaza',
            'city' => 'Al-Naser',
            'street' => 'Street-one',
            'home_number' => 'home-12',
            'zip_code' =>  'P960',      
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Mid-Gaza',
            'city' => 'Nuseirat',
            'street' => 'Street-two',
            'home_number' => 'home-13',
            'zip_code' => 'P860',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Khan Younis',
            'city' => 'alqarara',
            'street' => 'Street-three',
            'home_number' => 'home-14',
            'zip_code' => 'P760',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'North Gaza',
            'city' => 'Jabalia',
            'street' => 'Street-four',
            'home_number' => 'home-15',
            'zip_code' =>'P660',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Shujaiya',
            'city' => 'Mansoura',
            'street' => 'Street-five',
            'home_number' => 'home-16',
            'zip_code' =>'P560',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Rafah',
            'city' => 'alshaabwra',
            'street' => 'Street-Six',
            'home_number' => 'home-17',
            'zip_code' =>'P460',
        ]);
    }
}

