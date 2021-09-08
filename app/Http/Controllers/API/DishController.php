<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Dish;
use App\User;
use App\Http\Resources\DishResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function index()
    {

        return DishResource::collection(Dish::with(['user'])->where('user_id', '=', 'user->id')->get());
    }
}