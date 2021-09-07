<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        // # Con la risorsa e le relazioni
        // return UserResource::collection(User::with(['categories'])->paginate(5));

        return User::when(request('search'), function($query){
            $query->where('restaurant_name', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'asc')->paginate(5);
    }
}