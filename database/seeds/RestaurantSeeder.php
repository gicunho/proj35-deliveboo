<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $restaurant = new Restaurant();
            $restaurant->name = $faker->words(2, true);
            $restaurant->address = $faker->address();
            $restaurant->image = $faker->imageUrl(640, 480, 'restaurant', true);
            $restaurant->save();
        }
    }
}
