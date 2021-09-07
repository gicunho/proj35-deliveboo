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
        $categories = ['Pizza' => '&#127829', 'Sushi' => '&#127843', 'Fast Food' => '&#127828', 'Poke' => '&#129367', 'Cucina Cinese' => '&#129377', 'Cucina Italiana' => '&#127837', 'Cucina Americana' => '&#127789', 'Cucina Messicana' => '&#127790', 'Cucina Giapponese' => '&#127857', 'Panini' => '&#129386', 'Ramen' => '&#127836', 'Kebab' => '&#129369', 'Gelato e yougurt' => '&#127846'];
        foreach ($categories as $category_name => $category_emoji) {
            $cat = new Category();
            $cat->name = $category_name;
            $cat->slug = Str::slug($cat->name);
            $cat->emoji = $category_emoji;
            $cat->save();
        }
    }
}