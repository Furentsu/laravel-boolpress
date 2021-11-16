<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoryNames = ['Travel', 'Fitness', 'Music', 'Lifestyle', 'Food', 'Technology', 'News'];

        foreach($categoryNames as $name) {

            $category = new Category();

            $category->type = $name;
            $category->class = $faker->colorName();
            $category->save();
        }
    }
}
