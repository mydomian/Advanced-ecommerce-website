<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('admins')->delete();
        $adminRecords = [
            ['name' => 'admin',
                'type' => 'admin',
                'mobile' => '01943006504',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'image' => '',
                'status' =>1],
            ['name' => $faker->name,
                'type' => 'subadmin',
                'mobile' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'image' => '',
                'status' =>1],
            ['name' => $faker->name,
                'type' => 'admin',
                'mobile' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'image' => '',
                'status' =>1],
            ['name' => $faker->name,
                'type' => 'subadmin',
                'mobile' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'image' => '',
                'status' =>1],
            ['name' => $faker->name,
                'type' => 'admin',
                'mobile' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'image' => '',
                'status' =>1],
        ];
        foreach ($adminRecords as $key => $record){
            \App\Admin::create($record);
        }
    }
}
