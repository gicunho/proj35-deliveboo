<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Home */
Route::get('/', "PageController@index")->name('home');

/* Guest */
Route::resource('restaurants', RestaurantController::class);

/* Route::resource('orders', "OrderController@index")->name('order'); */

Route::resource('categories', CategoryController::class);


Auth::routes();

/* Admin */
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('dishes', DishController::class);
    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
});


 