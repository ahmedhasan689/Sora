<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('subscriptions')->insert([
            'name' => 'Default',
            'price' => 0,
            'number_of_image' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subscriptions')->insert([
            'name' => 'Premium',
            'price' => 25,
            'number_of_image' => 50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subscriptions')->insert([
            'name' => 'Ultimate',
            'price' => 50,
            'number_of_image' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
