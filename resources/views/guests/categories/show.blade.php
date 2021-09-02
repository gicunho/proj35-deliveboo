@extends('layouts.app')

@section('content')
    <div class="container">
        @if($category->users)
            @foreach ($category->users as $user)
                <a href="{{route('restaurant', $user->id)}}">{{$user->restaurant_name}}</a>
                @if($user->restaurant_image)
                    <img src="{{asset('storage/'. $user->restaurant_image)}}" alt="">
                @endif
            @endforeach
        @endif
    </div>
@endsection