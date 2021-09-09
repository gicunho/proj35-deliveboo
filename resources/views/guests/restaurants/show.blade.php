

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-7 mr-5">
                <div class="row">
                    <div class="col-12 ristorante_info">
                        <h1 class="text-capitalize">{{$user->restaurant_name}}</h1>
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <span>€</span>
                                @foreach($user->categories as $category)
                                <span class="m-1" style="font-size: 10px">•</span>
                                <span>{{$category->name}}</span>
                                @endforeach
                            </div>

                            <div class="pb-1">
                                <span>{{$user->address}} - </span>
                                <a href="#">Vedi mappa</a>
                            </div>

                            <div style="font-size: 11px">
                                <span>Consegna gratuita &</span>
                                <span>Aperti fino alle 23 *</span>
                            </div>

                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <h4>Il nostro menú: </h4>
                            </div>
                        </div>

                        <div class="row pl-2">
                            <div class="col-12 col-sm-12 col-md-6 col-xl-5 p-0  dish" v-for="(dish, index) in dishes" v-if="dish.user_id == {{$user->id}}">
                                <div class="description">
                                    <div>
                                        <h4 class="dish_name">@{{dish.name}}</h4>
                                        <p class="dish_price">Prezzo: € @{{dish.price}}</p>
                                    </div>
                                    <div class="button">
                                        <i class="fa fa-minus minus" aria-hidden="true" @click="removeFromCart(dish,index)"></i>
                                        <i class="fa fa-plus plus ml-2" aria-hidden="true" @click="addToCart(dish, {{$user->id}})"></i>
                                    </div>
                                </div>
                                <img :src="'/storage/' + dish.image" class="dish_image" width="150" height="150" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-4 position-relative pr-4">
                <div class="row sticky-top">
                    <div class="col-12 cart">
                        <button type="button" class="btn btn-primary btn-block" v-if="cart.length > 0 && cart[0].user_id == {{$user->id}}">Vai alla cassa</button>
                        <button disabled class="btn btn-primary btn-block" v-else>Vai alla cassa</button>
                        <h4 v-if="cart.length > 0 && cart[0].user_id == {{$user->id}}" class="mt-4">Il tuo ordine:</h4>
                        <ul class='px-0' v-if="cart.length > 0 && cart[0].user_id == {{$user->id}}">
                            <li v-for="(dish, index) in cart" v-if="dish.user_id == {{$user->id}}">
                                <div class="row">
                                    <div class="col-12">
                                    </div>
                                    <div class="col-3 py-1 pl-3">
                                        <i class="fa fa-minus-circle" aria-hidden="true" @click="removeFromCart(dish,index)"></i>
                                        <span class="quantity p-1">@{{dish.quantity}}</span>
                                        <i class="fa fa-plus-circle" aria-hidden="true" @click="addToCart(dish, {{$user->id}})"></i>
                                    </div> 
                                    <div class="col-5 py-1 px-0">
                                        <span>@{{dish.name}}</span>
                                    </div>
                                    <div class="col-2 py-1 px-0">
                                        <span>€ @{{dish.price}}</span>
                                    </div>
                                    <div class="col-1 py-1">
                                        <i class="fas fa-times-circle" @click="deleteDish(dish, index)"></i>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="row">
                                    <div class="col-4 offset-5 py-1">
                                        <h3>Totale: </h3>
                                    </div>
                                    <div class="col-3 py-1 px-0">
                                        <h3>€ @{{total_price}}</h3>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-danger btn-block" v-if="cart.length > 0 && cart[0].user_id == {{$user->id}}" @click="emptyCart">Svuota il carrello</button>
                        <div class="row d-flex text-center align-items-center" v-else>
                            <div class='col-12 pt-4'>
                                Il carrello è vuoto
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection