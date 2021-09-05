<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $users=['Beatrice', 'Lorenzo', 'Paolo', 'Gheorghe', 'Riccardo'];

        // foreach ($users as $user) {
        //     $person = new User();
        //     $person->name = $user;
        //     $person->email = $faker->email();
        //     $person->password = 'password';
        //     $person->piva = $faker->numberBetween(11111111111, 99999999999);
        //     $person->address = $faker->address();
        //     $person->restaurant_name = $faker->word();
        //     $person->restaurant_image = $faker->imageUrl(640, 480, 'food', true);
        //     $person->save();
        // }
    }
}
