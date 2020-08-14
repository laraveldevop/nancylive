<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['module_name'=>'video', 'detail'=> 'test'],
            ['module_name'=>'pdf', 'detail'=> 'test'],
            ['module_name'=>'product', 'detail'=> 'test'],
        ];
        DB::table('module')->insert($data);
    }
}
