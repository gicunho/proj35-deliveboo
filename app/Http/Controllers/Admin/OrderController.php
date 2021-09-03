<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());
        /* $orders = Order::where('user_id', '=', Auth::user()->id)->get(); */
        return view('admin.orders.index', compact('user'/* , 'orders' */));
    }

    public function stats()
    {
        $orders = Order::all();
        return view('admin.orders.stats', compact('orders'));
    }
}