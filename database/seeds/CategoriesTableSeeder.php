<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->delete();

        $faker = Faker::create();
        foreach (range(1, 10) as $i) {
            DB::table('categories')->insert([
                'name' => $faker->sentence,
                'isactive' => $faker->numberBetween(-5,5) > 0
            ]);
        }
    }
}
