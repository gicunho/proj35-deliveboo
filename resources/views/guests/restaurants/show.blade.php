@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-sm-12 col-lg-7 {{-- mr-5 --}}">
                <div class="row">
                    <div class="col-12 ristorante_info">
                        <h1 class="restaurant_name text-capitalize">{{$user->restaurant_name}}</h1>
                        <div class="col-12">
                            <div class="col-12 d-flex p-0">
                                <span class="">€</span>
                                @foreach($user->categories as $category)
                                    <span class="m-1" style="font-size: 10px">•</span>
                                    <span class="">{{$category->name}}</span>
                                @endforeach
                            </div>
                            <div class="col-12 p-0">
                                <span>{{$user->address}}</span>
                            </div>
                            <div class="col-12 p-0" style="font-size: 11px">
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
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mx-xl-4 mx-lg-3 mx-md-4 mx-sm-3 mx-0 col-sm-5 col-md-5 col-lg-5 col-xl-5 p-0 dish" v-for="(dish, index) in dishes" v-if="dish.user_id == {{$user->id}}">
                                    <div class="description">
                                        <div>
                                            <h4 class="dish_name">@{{dish.name}}</h4>
                                            <p class="dish_price">Prezzo: € @{{dish.price}}</p>
                                        </div>
                                        <div class="button">
                                            <i class="fa fa-plus plus ml-2" aria-hidden="true" @click="addToCart(dish, {{$user->id}})"></i>
                                        </div>
                                    </div>
                                    <div class="dish_image" :style="{ backgroundImage: 'url(\'storage/' + dish.image + '\')' }"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart -->
            <div class="col-12 col-lg-4  pr-lg-4 px-0 mt-5">
                <div class="container position-relative h-100">
                    <div class="row sticky-top mx-0">
                        <div class="col-12 cart">
                            <a href="{{route('orders.create', $user->id)}}" class="btn active btn-brand-secondary text-white btn-block" v-if="cart.length > 0 && cart[0].user_id == {{$user->id}}">Vai alla cassa</a>
                            <button disabled class="btn btn-brand-secondary text-white btn-block" v-else>Vai alla cassa</button>
                            <h4 v-if="cart.length > 0 && cart[0].user_id == {{$user->id}}" class="mt-4">Il tuo ordine:</h4>
                            <ul class='px-0' v-if="cart.length > 0 && cart[0].user_id == {{$user->id}}">
                                <li v-for="(dish, index) in cart" v-if="dish.user_id == {{$user->id}}">
                                    <div class="row d-flex justify-content-around">
                                        <div class="col-3 col-md-4 col-lg-3 py-1 px-0">
                                            <i class="fa fa-minus-circle" aria-hidden="true" @click="removeFromCart(dish,index)"></i>
                                            <span class="quantity px-1">@{{dish.quantity}}</span>
                                            <i class="fa fa-plus-circle" aria-hidden="true" @click="addToCart(dish, {{$user->id}})"></i>
                                        </div> 
                                        <div class="col-6 col-md-3 col-lg-5 py-1 px-0">
                                            <span>@{{dish.name}}</span>
                                        </div>
                                        <div class="col-2 col-md-2 col-lg-2 py-1 px-0">
                                            <span>€ @{{dish.price}}</span>
                                        </div>
                                        <div class="col-1 col-md-1 col-lg-1 py-1 px-0">
                                            <i class="fas fa-times-circle" @click="deleteDish(dish, index)"></i>
                                        </div>
                                    </div>
                                </li>
                                <hr>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-3 offset-sm-7 col-md-6 col-lg-4 offset-md-2 offset-lg-5 py-1">
                                            <h3>Totale: </h3>
                                        </div>
                                        <div class="col-sm-2 col-md-4 col-lg-3 py-1 px-0">
                                            <h3>€ @{{total_price}}</h3>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-brand-danger text-white btn-block" v-if="cart.length > 0 && cart[0].user_id == {{$user->id}}" @click="emptyCart">Svuota il carrello</button>
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
    </div>
@endsection