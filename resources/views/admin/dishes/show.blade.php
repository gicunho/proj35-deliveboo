@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-5 dish_card">
                <span>{{$dish->name}}</span>
                <img src="{{asset('storage/' . $dish->image )}}" alt="{{$dish->name}}">
                <p>{{$dish->description}}</p>
                <div class="price">
                    <span>€ {{$dish->price}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection