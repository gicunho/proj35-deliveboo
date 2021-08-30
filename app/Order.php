<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use App\Dish;

class Order extends Model
{
    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function dishes(){
        return $this->belongsToMany(Dish::class);
    }
}
