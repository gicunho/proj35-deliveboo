

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

                    <div v-for="(dish, index) in dishes" {{-- v-if="dish.user_id == {{$user->id}}"" --}}>
                        <div class="card col-3 d-flex justify-content-center text-center m-3">
                            <h4 class="mt-2">@{{dish.name}}</h4>
                            <p> @{{dish.description}}</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fas fa-minus-circle"></i> 
                                <p class="p-2 mb-0">@{{dish.price}}</p>
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <img :src="'storage/' + dish.image" :alt="dish.name" width="100%" height="170px" class="mb-2 rounded">
                            <button type="submit" @click="aggiungi(dish, index)">Aggiungi</button>
                        </div>

                    </div>

                    </div>
                </div>
            </div>

           
        </div>
    </div>


@endsection