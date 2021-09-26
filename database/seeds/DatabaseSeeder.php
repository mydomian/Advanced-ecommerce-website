<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminsTableSeeder::class,
            SectionsTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            BrandsTableSeeder::class,
            ProductAttributesTableSeeder::class,
            BannersTableSeeder::class,
        ]);
    }
}
