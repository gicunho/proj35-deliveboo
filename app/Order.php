<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Dish;

class Order extends Model
{
    protected $fillable = [
        'total_price', 'name', 'surname', 'address', 'phone_number', 'user_id',
    ];

    protected $dates = ['month'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}