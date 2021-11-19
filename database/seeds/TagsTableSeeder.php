<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Tag;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = ['Blogging', 'Freelancing', 'Miscellaneous', 'SEO', 'SEM', 'Software Development', 'Social Media'];

        foreach ($tags as $tag){
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->color = $faker->hexColor();

            $newTag->save();
        }
    }
}
