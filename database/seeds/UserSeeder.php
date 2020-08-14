<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'business_name' => 'Admin_business',
            'email' =>'admin@gmail.com',
            'mobile' =>'8888888888',
            'city' =>'Rajkot',
            'address' =>'rajkot',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123456'),
        ]);
    }
}
