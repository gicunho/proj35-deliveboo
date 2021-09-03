

@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center">
        <div class="card p-3 text-center">
            <h1 class="text-capitalize">{{$user->restaurant_name}}</h1>
            <img class="mb-3 rounded" src="{{$user->restaurant_image}}" alt="">
            <h4>Indirizzo: {{$user->address}}</h4>
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
    </div>


@endsection