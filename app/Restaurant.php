<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Order;
use App\Dish;


class Restaurant extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function dishes(){
        return $this->hasMany(Dish::class);
    }
}
