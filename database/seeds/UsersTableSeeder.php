<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $newUser = new User();
        $newUser->name = 'prova';
        $newUser->email = 'prova@prova.prova';
        $newUser->password = bcrypt('provaprova');

        $newUser->save();

        
        for ($i=0; $i<50; $i++) {
            $newUser = new User();

            $newUser->name = $faker->userName();
            $newUser->email = $faker->email();
            $newUser->password = bcrypt($faker->password(8,15));

            $newUser->save();
        }
    }
}
