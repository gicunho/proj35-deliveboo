@extends('layouts.admin')

@section('content')
    <h1>Index</h1>
    @foreach ($user->orders->sortByDesc('created_at') as $order)
    <ul>
        <li>{{$order->name}}</li>
        <li>{{$order->surname}}</li>
        <li>{{$order->address}}</li>
        <li>{{$order->phone_number}}</li>
        <li>{{$order->total_price}}</li>
    </ul>

        $table->decimal('total_price', 5, 2);
        $table->string('address');
        $table->string('name');
        $table->string('surname');
        $table->string('phone_number');
    @endforeach
@endsection