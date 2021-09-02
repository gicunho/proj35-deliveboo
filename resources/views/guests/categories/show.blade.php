@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($users as $user)    
        @if()
            
        @endif
        <div class="card">
            <h2>{{$user}}</h2>
        </div>
        @endforeach
    </div>
@endsection