
@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($users as $user)
            <div class="card">
                <h2>{{$user->restaurant_name}}</h2>
                <img src="{{$user->restaurant_image}}" alt="{{$user->restaurant_name}}" width="250">
                <a href="{{route('restaurant', $user->id)}}">Visualizza il menù</a>
            </div>
        @endforeach

        @foreach ($categories as $category)
            <div class="card">
                <a href="{{route('categories.show', $category->id)}}"><h2>{{$category->name}}</h2></a>    
            </div>
        @endforeach
    </div>

   

@endsection