<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'T-shirt',
                'category_image' => "",
                'category_discount' => 0,
                'description' => "",
                'url' => "t-shirt",
                'meta_title' => "",
                'meta_description' => "",
                'meta_keywords' => "",
                'status' => 1,
            ],
            [
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'T-Pollow-shirt',
                'category_image' => "",
                'category_discount' => 0,
                'description' => "",
                'url' => "t-pollow-shirt",
                'meta_title' => "",
                'meta_description' => "",
                'meta_keywords' => "",
                'status' => 1,
            ],
            [
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'T-half-shirt',
                'category_image' => "",
                'category_discount' => 0,
                'description' => "",
                'url' => "t-half-shirt",
                'meta_title' => "",
                'meta_description' => "",
                'meta_keywords' => "",
                'status' => 1,
            ],
        ]);
    }
}
