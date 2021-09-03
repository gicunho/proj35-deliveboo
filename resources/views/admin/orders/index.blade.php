@extends('layouts.admin')

@section('content')
    <h1>Index</h1>
    @foreach ($orders /*->sortByDesc('created_at') */ as $order)
        <ul>
            <li>{{ $order->name }}</li>
            <li>{{ $order->surname }}</li>
            <li>{{ $order->address }}</li>
            <li>{{ $order->phone_number }}</li>
            <li>{{ $order->total_price }}</li>
        </ul>
    @endforeach
@endsection
