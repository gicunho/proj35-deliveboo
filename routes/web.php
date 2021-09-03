<?php

use App\User;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;

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
/* Admin */

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('dishes', DishController::class);
    Route::resource('users', UserController::class);
    /* Route::resource('orders', OrderController::class); */
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
    Route::get('/orders/stats', 'OrderController@stats')->name('orders.stats');
});


/* Auth::routes(); */

/* Authentication Routes */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/* Registration Routes */
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

/* Home */
Route::get('/', "PageController@index");
Route::get('/{user}', "PageController@show")->name('restaurant');

/* Route::resource('orders', "OrderController@index")->name('order'); */
Route::resource('categories', CategoryController::class);

// Api
Route::get('users/{user}', function (User $user) {
    return new UserResource(User::find($user));
});