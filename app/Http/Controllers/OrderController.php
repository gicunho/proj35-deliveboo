<?php

namespace App\Http\Controllers;

use App\Dish;
use App\User;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishes = Dish::all();

        return view('guests.orders.create', compact('dishes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $validatedData = $request->validate([
            'address' => 'required | max:100 | min:10',
            'name' => 'required | max:50 ',
            'surname' => 'required | max:50',
            'phone_number' => 'required | string | numeric',
            'total_price' => 'required | numeric',
            'user_id' => 'required | numeric',
        ]);
        $dishes[] = $request['dishes'];
        $quantity = $request['quantity'];
 
        $order = Order::create($validatedData);

        foreach ($dishes as $key => $dish) {
            foreach ($dish as $k => $item){
                $order->dishes()->attach([$item], ['quantity' => $quantity[$k]]); //li attacco nella tabella pivot
            }
        }
        return redirect()->route('checkout', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
