<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Faker\Generator as Faker;

use App\Order;
use App\Dish;
use App\Category;

class User extends Authenticatable
{
    public function orders()
    {
        return $this->hasMany(Order::class, "foreign_key") ;
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class, "foreign_key");
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'piva', 'address', 'restaurant_name', 'restaurant_image','phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
