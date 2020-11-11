<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'Artist',
            'slug' => 'artist',
        ]);

        DB::table('roles')->insert([
            'name' => 'Product',
            'slug' => 'product',
        ]);
         DB::table('roles')->insert([
            'name' => 'Magazine',
            'slug' => 'Magazine',
        ]);

    }
}
