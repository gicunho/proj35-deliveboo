<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Restaurant extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
