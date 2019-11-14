<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Person;
use App\Post;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('posts')->delete();

        $faker = Faker::create();
        $cats_id = Category::all()->pluck('id')->toArray();
        $pers_id = Person::all()->pluck('id')->toArray();
        foreach (range(1,20) as $i) {
            DB::table('posts')->insert([
                'title' => $faker->sentence,
                'summary' => $faker->sentence,
                'content' => $faker->paragraph,
                'cat_id' => $faker->randomElement($cats_id),
                'per_id' => $faker->randomElement($pers_id)
            ]);
        }
    }
}
