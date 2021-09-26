<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            ['image' => 'banner1.png', 'link' => '', 'name' => 'Black Jaket','alt' => 'Banner Image', 'status' =>1],
            ['image' => 'banner2.png', 'link' => '', 'name' => 'blue Jaket','alt' => 'Banner Image', 'status' =>1],
            ['image' => 'banner3.png', 'link' => '', 'name' => 'pink Jaket','alt' => 'Banner Image', 'status' =>1],
        ]);
    }
}
