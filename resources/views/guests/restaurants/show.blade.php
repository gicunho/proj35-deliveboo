

@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-8 ristorante_info">
                <h1 class="text-capitalize">{{$user->restaurant_name}}</h1>
                <div class="col-12">
                    @foreach($user->categories as $category)
                    <span>{{$category->name}} - </span>
                    @endforeach
                    <span>Consegna gratuita - </span><span>Aperti fino alle 23 - </span><span>{{$user->address}} - </span><a href="#">Vedi mappa</a>
                    <p>Ordina il tuo piatto preferito a casa tua da {{$user->restaurant_name}} grazie alla consegna a domicilio di Deliveboo.</p>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4>Il nostro menú: </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-xl-4 d-flex flex-column align-items-center mb-5" v-for="(dish, index) in dishes" v-if="dish.user_id == {{$user->id}}">
                        <img :src="'/storage/' + dish.image" class="dish_image" width="200" alt="">
                        <div class="d-flex align-items-center justify-content-center mt-3 text-center">
                            <i class="fa fa-plus-circle mr-2" aria-hidden="true" @click="addToCart(dish)"></i>
                            <h4 class="m-0 px-2 dish_name">@{{dish.name}}</h4>
                            <i class="fa fa-minus-circle" aria-hidden="true" @click="removeFromCart(dish,index)"></i>
                        </div>
                        <p class="dish_price">Prezzo: € @{{dish.price}}</p>
                    </div>
                </div>
            </div>
            <div class="col-4 cart">
                <button type="button" class="btn btn-primary btn-block" v-if="cart.length > 0">Vai alla cassa</button>
                <button disabled class="btn btn-primary btn-block" v-else>Vai alla cassa</button>
                <h4 v-if="cart.length > 0" class="mt-4">Il tuo ordine:</h4>
                <ul class='px-0' v-if="cart.length > 0">
                    <li v-for="(dish, index) in cart">
                        <div class="row">
                            <div class="col-12">
                            </div>
                            <div class="col-3 py-1 pl-3">
                                <i class="fa fa-plus-circle" aria-hidden="true" @click="addToCart(dish)"></i>
                                <span class="quantity">@{{dish.quantity}}</span>
                                <i class="fa fa-minus-circle" aria-hidden="true" @click="removeFromCart(dish,index)"></i>
                            </div> 
                            <div class="col-5 py-1 px-0">
                                <span>@{{dish.name}}</span>
                            </div>
                            <div class="col-2 py-1 px-0">
                                <span>€ @{{dish.price}}</span>
                            </div>
                            <div class="col-1">
                                <i class="fas fa-times-circle" @click="deleteDish(dish, index)"></i>
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
                <button type="button" class="btn btn-danger btn-block" v-if="cart.length > 0" @click="emptyCart">Svuota il carrello</button>
                <div class="row d-flex text-center align-items-center h-100" v-else>
                    <div class='col-12'>
                        Il carrello è vuoto
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection