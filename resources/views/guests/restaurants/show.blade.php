

@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize">{{$user->restaurant_name}}</h1>
                <img class="mb-3 rounded" src="{{$user->restaurant_image}}" alt="">
                <h4>Indirizzo: {{$user->address}}</h4>
            </div>
            <div class="col-6" v-for="(dish, index) in dishes" v-if="dish.user_id == {{$user->id}}">
                <h4>@{{dish.name}}</h4>
                <h5>€ @{{dish.price}}</h5>
                <i class="fa fa-plus-circle" aria-hidden="true" @click="addToCart(dish)"></i>
                <i class="fa fa-minus-circle" aria-hidden="true" @click="removeFromCart(dish,index)"></i>
                <img :src="'/storage/' + dish.image" width="200" alt="">
            </div>
        </div>
    </div>




@endsection