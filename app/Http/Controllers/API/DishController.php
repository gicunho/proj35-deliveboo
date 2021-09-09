<?php

namespace App\Http\Controllers\API;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;
use App\User;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        return DishResource::collection(Dish::with(['user'])->get());
    }
}
