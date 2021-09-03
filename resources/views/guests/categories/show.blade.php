@extends('layouts.app')

@section('content')
    <h1 class="container d-flex justify-content-center">Ristoranti di {{$category->name}}</h1>
    <div class="container d-flex justify-content-center">
        @if($category->users)
            @foreach ($category->users as $user)
                <div class="card col-md-4 m-3 p-5 text-center">
                    <a href="{{route('restaurant', $user->id)}}">
                        <h3>{{$user->restaurant_name}}</h3>
                    </a>
                    @if($user->restaurant_image)
                        <img src="{{asset('storage/'. $user->restaurant_image)}}" alt="">
                    @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection