<?php

use Illuminate\Database\Seeder;

class ProductAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_attributes')->insert([
            ['product_id' => 1, 'size' => 'small', 'price' => 1200, 'sku' => 'KDD43', 'stock' => 12],
            ['product_id' => 2, 'size' => 'medium', 'price' => 1400, 'sku' => 'UHI5', 'stock' => 15],
            ['product_id' => 3, 'size' => 'large', 'price' => 1850, 'sku' => 'JIUU57', 'stock' => 18],
        ]);
    }
}
