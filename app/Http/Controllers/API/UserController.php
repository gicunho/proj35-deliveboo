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
        return UserResource::collection(User::with('categories')->when(request('search'), function($query){
            $query->where(
                'restaurant_name', 'like', '%' . request('search') . '%',
            );
        })->when(request('search_category'), function($item){
            $item->whereHas('categories', function($q){
                $request = request('search_category');
                for ($i=0; $i < count($request); $i++) { 
                    $q->where('categories.slug', '=', $request[$i])
                    ->orWhere('categories.slug', '=', $request[$i])
                    ->orWhere('categories.slug', '=', $request[$i]);
                }
            });
        })->orderBy('id', 'asc')->paginate(9));

    }
}