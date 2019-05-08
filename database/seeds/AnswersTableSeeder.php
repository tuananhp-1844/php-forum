<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AnswersTableSeeder extends Seeder
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
        $questions = App\Models\Question::all()->pluck('id')->all();
        foreach (range(1, 200) as $index) {
            $company = App\Models\Answer::create([
                'question_id' => $faker->randomElement($questions),
                'user_id' => $faker->randomElement($users),
                'content' => $faker->realText,
                'parent_id' => 0,
            ]);
        }
    }
}
