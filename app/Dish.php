<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Order;


class Dish extends Model
{
    protected $fillable = [
        'description', 'name', 'price', 'is_visible', 'image', 'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
