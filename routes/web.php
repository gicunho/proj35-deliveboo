<?php


use Illuminate\Support\Facades\Route;
use App\User;
use App\Http\Resources\UserResource;
use App\Order;
use App\Http\Resources\OrderResource;
use App\Category;
use App\Dish;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\DishResource;

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

/* Checkout */
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

/* Admin */

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('dishes', DishController::class);
    Route::resource('users', UserController::class);
    /* Route::resource('orders', OrderController::class); */
    Route::get('/orders', 'OrderController@index')->name('orders.index');
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
Route::get('/', "PageController@index")->name('restaurants');
Route::get('/{user}', "PageController@show")->name('restaurant');

// Api
Route::get('users/{user}', function (User $user) {
    return new UserResource(User::find($user));
});

Route::get('orders/{order}', function (Order $order) {
    return new OrderResource(Order::find($order));
});

Route::get('categories/{category}', function (Category $category) {
    return new CategoryResource(Category::find($category));
});

Route::get('dishes/{dish}', function (Dish $dish) {
    return new DishResource(Category::find($dish));
});