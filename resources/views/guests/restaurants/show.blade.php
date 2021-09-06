

@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize">{{$user->restaurant_name}}</h1>
                <img class="mb-3 rounded" src="{{$user->restaurant_image}}" alt="">
                <h4>Indirizzo: {{$user->address}}</h4>
            </div>
                <div class="col-12 d-flex">
                    <div class="row">
                    @foreach ($dishes as $dish)
                        @if($dish->user_id == $user->id)
                            @if($dish->is_visible == true) 
                                <div class="card col-3 d-flex justify-content-center text-center px-3 mx-2">
                                    <h4>{{$dish->name}}</h4>
                                    <p>{{$dish->description}}</p>
                                    <div class="d-flex justify-content-center">
                                        <i class="fas fa-minus-circle"></i> 
                                        <p class="px-2">{{$dish->price}}</p>
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                    <img src="{{asset('storage/' . $dish->image)}}" alt="{{$dish->name}}" width="100%">
                                </div>
                            @endif
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
    </div>


@endsection