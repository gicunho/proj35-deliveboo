

@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{$user->restaurant_name}}</h1>
        <img src="{{$user->restaurant_image}}" alt="">
        <h4>{{$user->address}}</h4>
        <ul>
            @foreach ($dishes as $dish)
                @if($dish->user_id == $user->id)
                    @if($dish->is_visible == true) 
                        <li>{{$dish->name}}</li>
                        <li>{{$dish->description}}</li>
                        <li>{{$dish->price}}</li>
                        <li><img src="{{asset('storage/' . $dish->image)}}" alt=""></li>
                    @endif
                @endif
            @endforeach
        </ul>
    </div>


@endsection