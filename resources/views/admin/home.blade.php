@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div>
                        <a href="{{route('admin.dishes.index')}}">I tuoi Piatti</a>
                    </div>

                    <div>
                        <a href="{{route('admin.orders.index')}}">Storico degli Ordini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">I tuoi dati</div>

                <div class="card-body">
                    <ul>
                        <li>Nome ristorante: {{$user->restaurant_name}}</li>
                        <li>Email: {{$user->email}}</li>
                        <li>Indirizzo: {{$user->address}}</li>
                        <li>P.IVA: {{$user->piva}}</li>
                        <li>Numero di telefono: {{-- {{$user->name}} --}}</li>
                        <li>Categoria: {{-- {{$user->name}} --}}</li>
                        <li>Immagine: {{$user->restaurant_image}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
