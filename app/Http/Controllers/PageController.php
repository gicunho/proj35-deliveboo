<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Dish;

class PageController extends Controller
{
    public function index()
    {
        /* $users = User::all(); */
        $categories = Category::all();
        return view('guests.restaurants.index', compact(/* 'users', */'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('guests.restaurants.show', compact('user'));
    }
}