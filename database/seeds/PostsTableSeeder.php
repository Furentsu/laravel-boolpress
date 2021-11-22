<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Tag;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<50; $i++) {
            $newpost = new Post();

            $newpost->title = $faker->words(10, true);
            $newpost->author = $faker->name();
            $newpost->post_content = $faker->paragraphs(8, true);
            $newpost->post_date = $faker->dateTime();
            $newpost->post_image = $faker->imageUrl(640, 480, 'random', true);
            $newpost->slug = Str::slug($newpost->title, '-');

            $newpost->save();

            $tags = Tag::inRandomOrder()->take(3)->pluck('id')->toArray();
            $newpost->tags()->sync($tags);
        }
    }
}
