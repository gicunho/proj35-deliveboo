<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Dish;

class Order extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dishes(){
        return $this->belongsToMany(Dish::class);
    }
}
