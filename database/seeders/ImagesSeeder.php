<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Category;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'name' => 'Image One',
            'image_path' => asset('assets/img/avatar5.png'),
            'description' => 'Image For Test Number One',
            'likes' => 20,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'name' => 'Image Two',
            'image_path' => asset('assets/img/avatar04.png'),
            'description' => 'Image For Test Number Two',
            'likes' => 40,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'name' => 'Image Three',
            'image_path' => asset('assets/img/avatar3.png'),
            'description' => 'Image For Test Number Three',
            'likes' => 25,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'name' => 'Image Four',
            'image_path' => asset('assets/img/avatar2.png'),
            'description' => 'Image For Test Number Four',
            'likes' => 10,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'name' => 'Image Five',
            'image_path' => asset('assets/img/avatar5.png'),
            'description' => 'Image For Test Number Five',
            'likes' => 50,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'name' => 'Image Six',
            'image_path' => asset('assets/img/user1-128x128.jpg'),
            'description' => 'Image For Test Number Six',
            'likes' => 100,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'name' => 'Image Seven',
            'image_path' => asset('assets/img/user3-128x128.jpg'),
            'description' => 'Image For Test Number Seven',
            'likes' => 150,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'name' => 'Image Eight',
            'image_path' => asset('assets/img/user2-160x160.jpg'),
            'description' => 'Image For Test Number Eight',
            'likes' => 5,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'name' => 'Image Nine',
            'image_path' => asset('assets/img/user1-128x128.jpg'),
            'description' => 'Image For Test Number Nine',
            'likes' => 250,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
