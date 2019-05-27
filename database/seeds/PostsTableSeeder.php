<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        $faker = Faker::create();
        // following line retrieve all the user_ids from DB
        $users = User::all()->pluck('id')->all();
        $categories = Category::all()->pluck('id')->all();
        foreach (range(1, 50) as $index) {
            $company = Post::create([
                'title' => $faker->company,
                'user_id' => $faker->randomElement($users),
                'category_id' => $faker->randomElement($categories),
                'content' => $faker->realText($maxNbChars = 10000, $indexSize = 2),
                'view' => 0,
                'status' => 1,
            ]);
        }
    }
}
