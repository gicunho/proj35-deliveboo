

@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-8 ristorante_info">
                <h1 class="text-capitalize">{{$user->restaurant_name}}</h1>
                <div>
                    @foreach($user->categories as $category)
                    <span>{{$category->name}} - </span>
                    @endforeach
                    <span>Consegna gratuita - </span><span>Aperti fino alle 23 - </span><span>{{$user->address}} - </span><a href="#">Vedi mappa</a>
                    <p>Ordina il tuo piatto preferito a casa tua da {{$user->restaurant_name}} grazie alla consegna a domicilio di Deliveboo.</p>

                </div>
                <div class="row">
                    <div class="col-6" v-for="(dish, index) in dishes" v-if="dish.user_id == {{$user->id}}">
                        <h4>@{{dish.name}}</h4>
                        <h5>€ @{{dish.price}}</h5>
                        <i class="fa fa-plus-circle" aria-hidden="true" @click="addToCart(dish)"></i>
                        <i class="fa fa-minus-circle" aria-hidden="true" @click="removeFromCart(dish,index)"></i>
                        <img :src="'/storage/' + dish.image" width="200" alt="">
                    </div>
                </div>
            </div>
            <div class="col-4 cart">
                <button type="button" class="btn btn-primary btn-block" v-if="cart.length > 0">Vai alla cassa</button>
                <button disabled class="btn btn-primary btn-block" v-else>Vai alla cassa</button>
                <ul class='px-0' v-if="cart.length > 0">
                    <li v-for="dish in cart">
                        <div class="row">
                                <div class="col-3 py-1 pl-3">
                                    <span class="quantity">@{{dish.quantity}}</span>
                                </div> 
                                <div class="col-6 py-1 px-0">
                                    <span>@{{dish.name}}</span>
                                </div>
                                <div class="col-3 py-1 px-0">
                                    <span>€ @{{dish.price}}</span>
                                </div>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <div class="row">
                            <div class="col-4 offset-5 py-1">Totale: </div>
                            <div class="col-3 py-1 px-0">€ @{{total_price}}</div>
                        </div>
                    </li>
                </ul>
                <div class="row d-flex text-center align-items-center h-100" v-else>
                    <div class='col-12'>
                        Il carrello è vuoto
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection