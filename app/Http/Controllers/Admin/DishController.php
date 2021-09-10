<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());
        $dishes = Dish::all()->sortByDesc('id');
        return view('admin.dishes.index', compact('dishes', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(auth()->id());
        return view('admin.dishes.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->id());

        $validatedData = $request->validate([
            'description' => 'required | max:500 | min:10',
            'price' => 'required | between: 0, 999.99',
            'name' => 'required | max:100',
            'is_visible' => 'required',
            'image' => 'required | image | max:500',
        ]);
        $validatedData['user_id'] = $user->id;

        if ($request->hasFile('image')) {
            $file_path = Storage::put('dish_images', $validatedData['image']);
            $validatedData['image'] = $file_path;
        }

        $dish = Dish::create($validatedData);
        return redirect()->route('admin.dishes.index', compact('dish'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        if ($dish->user_id != auth()->id()) {
            // maybe a redirect with some info here???
            /*             return redirect()->route('admin.home')->with('error', 'Non sei autorizzato!');
 */
            return redirect()->route('admin.home')->withErrors('Non autorizzato!');
        } else {
            // allow portfolio edit
            return view('admin.dishes.edit', compact('dish'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $validatedData = $request->validate([
            'description' => 'required | max:500 | min:10',
            'price' => 'required | between: 0, 999.99',
            'name' => 'required | max:100',
            'is_visible' => 'required',
            'image' => 'nullable | image | max:500',
        ]);

        if (array_key_exists('image', $validatedData)) {
            Storage::delete($dish->image);
            $file_path = Storage::put('dish_images', $validatedData['image']);
            $validatedData['image'] = $file_path;
        }

        $dish->update($validatedData);
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }
}