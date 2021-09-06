@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <a href="{{route('admin.dishes.index')}}"> <i class="fas fa-long-arrow-alt-left">Torna ai tuoi piatti</i></a>
                 </div>
                <h1>{{$dish->name}}</h1>
                <img src="{{asset('storage/' . $dish->image )}}" alt="{{$dish->name}}">
                <p>{{$dish->price}}</p>
                <p>{{$dish->description}}</p>
            </div>
        </div>
    </div>
@endsection