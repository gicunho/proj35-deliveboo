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
        $categories = ['Pizza' => '&#127829', 'Sushi' => '&#127857', 'Fast Food' => '&#127828', 'Poke' => '&#127789', 'Cucina Cinese' => '&#129369', 'Cucina Italiana' => '&#127837', 'Cucina Americana' => '&#129386', 'Cucina Messicana' => '&#127791', 'Cucina Giapponese' => '&#129367', 'Panini' => '&#129377', 'Ramen' => '&#127836', 'Kebab' => '&#127791', 'Gelato e yougurt' => '&#127846'];
        foreach ($categories as $category_name => $category_emoji) {
            $cat = new Category();
            $cat->name = $category_name;
            $cat->slug = Str::slug($cat->name);
            $cat->emoji = $category_emoji;
            $cat->save();
        }
    }
}