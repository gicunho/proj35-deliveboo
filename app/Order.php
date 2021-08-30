<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;

class Order extends Model
{
    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
