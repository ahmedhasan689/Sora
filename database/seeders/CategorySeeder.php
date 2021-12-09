<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Image',
            'type' => 'parent',
            'salable' => 0,
            'parent_id' => 0,
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Painting',
            'parent_id' => '0',
            'type' => 'parent',
            'salable' => 1,
        ]);

        DB::table('categories')->insert([
            'category_name' => 'nature',
            'parent_id' => '1',
            'type' => 'child',
            'salable' => 0,
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Tech',
            'parent_id' => '2',
            'type' => 'child',
            'salable' => 0,
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Design',
            'parent_id' => '1',
            'type' => 'child',
            'salable' => 0,
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Logo',
            'parent_id' => '2',
            'type' => 'child',
            'salable' => 0,
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Wallpaper',
            'parent_id' => '1',
            'type' => 'child',
            'salable' => 0,
        ]);
    }
}
