<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'image_header' => asset('Front/img/header-1.jpg'),
            'information' => 'This Is Infromation One For This User',
            'followings' => 100,
            'followers' => 150,
            'user_id' => 9,
        ]);

        DB::table('profiles')->insert([
            'image_header' => asset('Front/img/header-2.jpg'),
            'information' => 'This Is Infromation Two For This User',
            'followings' => 170,
            'followers' => 120,
            'user_id' => 10,
        ]);

        DB::table('profiles')->insert([
            'image_header' => asset('Front/img/header-3.jpg'),
            'information' => 'This Is Infromation Three For This User',
            'followers' => 250,
            'followings' => 200,
            'user_id' => 11,
        ]);

        DB::table('profiles')->insert([
            'image_header' => asset('Front/img/header-4.png'),
            'information' => 'This Is Infromation Four For This User',
            'followers' => 130,
            'followings' => 1235,
            'user_id' => 12,
        ]);

        DB::table('profiles')->insert([
            'image_header' => asset('Front/img/header-5.jpg'),
            'information' => 'This Is Infromation Five For This User',
            'followers' => 180,
            'followings' => 120,
            'user_id' => 13,
        ]);
    }
}
