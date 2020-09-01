<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BusinessTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker::create();
        foreach (range(1,100)as $index) {
            \App\BusinessType::insert([
                'type_name' => $faker->sentence(3),

            ]);
        }
    }
}
