
@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="text-right mr-3">
            <a class="border rounded-circle p-2" href="{{ route('admin.orders.stats') }}"><i class="fas fa-chart-line"></i></a>
        </div>

        <h1 class="text-center">I tuoi ordini</h1>

        <div class="d-flex flex-wrap justify-content-center">
            <div class="card shadow p-3 mb-5 bg-white rounded col-md-5 m-3 p-3" v-for="order in orders" v-if="order.user_id ===  {{ $user->id }}">
                <div class="d-flex">
                    <h4>@{{ order . name }}</h4>
                    <h4>@{{ order . surname }}</h4>
                </div>
                <h6>Indirizzo: @{{ order . address }}</h6>
                <h6>Telefono: @{{ order . phone_number }}</h6>
                <h6>Prezzo: @{{ order . total_price }}$</h6>
            </div>
        </div>
    </div>
@endsection
