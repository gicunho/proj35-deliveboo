<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::All();
        return view('admin.users.index', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $categories = Category::All();
        return view('admin.users.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'email' => 'required | max:255 | min:5',
            'password' => 'required | min:8',
            'address' => 'required | max:255 | min:5',
            'restaurant_name' => 'required | max:255 | min:5',
            'restaurant_image' => 'nullable | image | max:500',
            'category_id' => 'nullable | exists:categories,id'
        ]);
        $user->update($validatedData);

        if($request->hasFile('image')){
            $file_path = Storage::put('user_images', $validatedData['image']);
            $validatedData['image'] = $file_path;
        }

        $user = User::create($validatedData);
        $user->categories()->attach($request->$categories);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $user->categories()->detach();

        return redirect()->route('guests.welcome');
    }
}
