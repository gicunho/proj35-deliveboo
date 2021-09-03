
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="input-group">
            <div class="form-outline">
              <input id="search-focus" type="search" id="form1" class="form-control" placeholder="Cerca un ristorante"/>
            </div>
            <button type="button" class="btn btn-primary">
              <i class="fas fa-search"></i>
            </button>
        </div>
        <div class="d-flex">
            @foreach ($categories as $category)
                    <a href="{{route('categories.show', $category->id)}}"><h2>{{$category->name}}</h2></a>    
            @endforeach
        </div>

        <div v-for='user in users' class="card">
            <h2>@{{user.name}}</h2>
            <img :src="user.restaurant_image" alt="">
        </div>

        {{-- @foreach ($users as $user)
            <div class="card">
                <h2>{{$user->restaurant_name}}</h2>
                <img src="{{$user->restaurant_image}}" alt="{{$user->restaurant_name}}" width="250">
                <a href="{{route('restaurant', $user->id)}}">Visualizza il menù</a>
            </div>
        @endforeach --}}

        
    </div>

   

@endsection