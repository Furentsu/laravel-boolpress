<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<100; $i++) {
            $newpost = new Post();

            $newpost->title = $faker->words(10, true);
            $newpost->author = $faker->name();
            $newpost->post_content = $faker->paragraphs(8, true);
            $newpost->post_date = $faker->dateTime();
            $newpost->post_image = $faker->imageUrl(640, 480, 'random', true);
            $newpost->slug = Str::slug($newpost->title, '-');

            $newpost->save();
        }
    }
}
