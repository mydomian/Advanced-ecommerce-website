<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            ['name' => 'Appolo', 'status' =>1],
            ['name' => 'Easy Fashion', 'status' =>0],
            ['name' => 'Dzone', 'status' =>1],
        ]);
    }
}
