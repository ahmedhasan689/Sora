<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // To Run Seeder ...
        $this->call([
//            CountriesSeeder::class,
//            subscriptionsSeeder::class,
//            UsersSeeder::class,
            // CategorySeeder::class,
            // ImagesSeeder::class,
            ProfileSeeder::class,
        ]);

        // \App\Models\User::factory(30)->create();

    }
}
