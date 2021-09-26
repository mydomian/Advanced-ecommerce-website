<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
                'category_id' => 1,
                'brand_id' => 1,
                'section_id' => 1,
                'product_name' => 'Formal T-shirt',
                'product_code' => "B001NT",
                'product_color' => "Blue",
                'product_price' => 1500,
                'product_weight' => 200,
                'product_discount' => 10,
                'main_image' => "",
                'product_video' => "",
                'description' => "This is simple product description",
                'wash_care' => "",
                'fabric' => "",
                'pattern' => "",
                'sleeve' => "",
                'fit' => "",
                'occasion' => "",
                'meta_title' => "",
                'meta_keywords' => "",
                'meta_description' => "",
                'is_feature' => "yes",
                'status' => 1,
            ],
            [
                'category_id' => 1,
                'brand_id' => 1,
                'section_id' => 1,
                'product_name' => 'Falk T-shirt',
                'product_code' => "E019T",
                'product_color' => "White",
                'product_price' => 2000,
                'product_weight' => 300,
                'product_discount' => 10,
                'main_image' => "",
                'product_video' => "",
                'description' => "This is simple product description",
                'wash_care' => "",
                'fabric' => "",
                'pattern' => "",
                'sleeve' => "",
                'fit' => "",
                'occasion' => "",
                'meta_title' => "",
                'meta_keywords' => "",
                'meta_description' => "",
                'is_feature' => "no",
                'status' => 1,
            ],
        ]);
    }
}
