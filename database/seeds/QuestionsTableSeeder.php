<?php

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // following line retrieve all the user_ids from DB
        $users = App\Models\User::all()->pluck('id')->all();
        $categories = App\Models\Category::all()->pluck('id')->all();
        foreach (range(1, 50) as $index) {
            $company = App\Models\Question::create([
                'title' => $faker->company,
                'user_id' => $faker->randomElement($users),
                'category_id' => $faker->randomElement($categories),
                'content' => $faker->realText,
            ]);
        }
    }
}
