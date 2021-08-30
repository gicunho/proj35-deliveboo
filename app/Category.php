<?php

namespace App;
use App\Restaurant;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
