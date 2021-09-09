<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Pizza' => 'pizza.png', 'Sushi' => 'sushi.png', 'Fast Food' => 'fastfood.png', 'Poke' => 'poke.png', 'Cucina Cinese' => 'chinese.png', 'Cucina Italiana' => 'italian.png', 'Cucina Americana' => 'american.png', 'Cucina Sana' => 'healthy.png', 'Cucina Giapponese' => 'japanese.png', 'Panini' => 'sandwich.png', 'Cucina Coreana' => 'korean.png', 'Cucina Asiatica' => 'asian.png', 'Gelato e yougurt' => 'icecreamandyogort.png'];
        foreach ($categories as $category_name => $category_emoji) {
            $cat = new Category();
            $cat->name = $category_name;
            $cat->slug = Str::slug($cat->name);
            $cat->emoji = $category_emoji;
            $cat->save();
        }
    }
}