<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Country;
use App\Models\Subscription;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(30)->create();

        DB::table('users')->insert([
            'name' => 'Ahmed',
            'phone_number' => '0595477132',
            'email' => 'hlhatab@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 150,
            'followings' => 200,
            'user_type' => 2,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Yazan',
            'phone_number' => '0567496089',
            'email' => 'Yazan@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar.png'),
            'followers' => 100,
            'followings' => 250,
            'user_type' => 2,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'Ibrahim',
            'phone_number' => '0590000001',
            'email' => 'Ibrahim@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 250,
            'followings' => 200,
            'user_type' => 2,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'Omar',
            'phone_number' => '0590000002',
            'email' => 'Omar@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 150,
            'followings' => 200,
            'user_type' => 1,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'Mohammed',
            'phone_number' => '0590000003',
            'email' => 'Mohammed@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 150,
            'followings' => 200,
            'user_type' => 1,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'Zaid',
            'phone_number' => '0590000004',
            'email' => 'Zaid@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 150,
            'followings' => 125,
            'user_type' => 1,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'Rafat',
            'phone_number' => '0590000005',
            'email' => 'Rafat@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 150,
            'followings' => 150,
            'user_type' => 1,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'Hamza',
            'phone_number' => '0590000006',
            'email' => 'Hamza@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 150,
            'followings' => 300,
            'user_type' => 1,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'User-one',
            'phone_number' => '0590000007',
            'email' => 'User-one@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 150,
            'followings' => 300,
            'user_type' => 0,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'User-two',
            'phone_number' => '0590000008',
            'email' => 'User-two@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 50,
            'followings' => 320,
            'user_type' => 0,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'User-three',
            'phone_number' => '0590000009',
            'email' => 'User-three@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 180,
            'followings' => 100,
            'user_type' => 0,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'User-four',
            'phone_number' => '0590000000',
            'email' => 'User-four@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 170,
            'followings' => 390,
            'user_type' => 0,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);

        DB::table('users')->insert([
            'name' => 'User-five',
            'phone_number' => '0590000010',
            'email' => 'User-five@gmail.com',
            'email_verified_at'=> now(),
            'password' =>  Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'avatar' => asset('assets/img/avatar5.png'),
            'followers' => 130,
            'followings' => 220,
            'user_type' => 0,
            'subscription_id' => Subscription::all()->random()->id, 
            'country_id' => Country::all()->random()->id,
        ]);
    }
}
