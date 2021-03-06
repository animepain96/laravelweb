<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('persons')->delete();

        $faker = Faker::create();
        foreach (range(1, 10) as $i) {
            DB::table('persons')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email
            ]);
        }
    }
}
