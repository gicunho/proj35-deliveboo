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
        $categories = ['Pizza', 'Sushi', 'Fast Food', 'Poke', 'Cucina Cinese', 'Cucina Italiana', 'Cucina Americana', 'Cucina Giapponese', 'Panini', 'Ramen', 'Kebab', 'Gelato e yougurt'];
        foreach($categories as $category){
            $cat = new Category();
            $cat->name = $category;
            $cat->slug = Str::slug($cat->name);
            $cat->save();
        }
    }
}
