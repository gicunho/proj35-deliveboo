

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
                    
                    </div>
                </div>
            </div>
            </div>
    </div>


@endsection