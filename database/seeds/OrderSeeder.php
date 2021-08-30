<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $order = new Order();
            $order->total_price = $faker->randomFloat(2, 1, 999);
            $order->address = $faker->address();
            $order->name = $faker->firstName();
            $order->surname = $faker->lastName(); 
            $order->phone_number = $faker->phoneNumber();              
            $order->save();
        }
    }
}
