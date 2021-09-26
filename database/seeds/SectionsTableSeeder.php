<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sections')->insert([
            ['section_name' => 'Men', 'status' =>1],
            ['section_name' => 'Women', 'status' =>1],
            ['section_name' => 'Kids', 'status' =>1],
        ]);
    }
}
