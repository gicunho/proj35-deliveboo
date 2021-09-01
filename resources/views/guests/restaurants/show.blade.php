@extends('layouts.app')

@section('content')

<div class="container">
        <h1>Show</h1>
        <h1>{{$user->restaurant_name}}</h1>
        <img src="{{$user->restaurant_image}}" alt="">
        <h4>{{$user->address}}</h4>
    </div>
@endsection