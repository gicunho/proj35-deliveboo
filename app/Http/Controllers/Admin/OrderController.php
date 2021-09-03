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
        $orders = Order::where('user_id', '=', Auth::user()->id)->get();
        /* $orders = Order::where('user_id', '=', $user->id); */
        return view('admin.orders.index', compact('user', 'orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function stats()
    {
        $orders = Order::all();
        return view('admin.orders.stats', compact('orders'));
    }
}