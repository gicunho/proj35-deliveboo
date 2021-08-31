<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $dish = new Dish();
            $dish->description = $faker->paragraphs(4, true);
            $dish->price = $faker->randomFloat(2, 1, 50);
            $dish->name = $faker->word();
            $dish->is_visible = $faker->numberBetween(0,1);
            $dish->image = $faker->imageUrl(640, 480, 'food', true);
            $dish->user_id = $faker->numberBetween(1, 5);     
            $dish->save();
        }
    }
}
