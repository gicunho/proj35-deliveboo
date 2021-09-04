@extends('layouts.admin')

@section('content')

    <div class="container">

        <h1>Ordini</h1>

        <div>
            <a href="{{ route('admin.orders.stats') }}">Le tue statistiche</a>
        </div>

        <div class="d-flex text-center flex-wrap justify-content-center">
            <div class="card col-md-5 m-3" v-for="order in orders" v-if="order.user_id ===  {{ $user->id }}">
                <ul>
                    <li>@{{ order . name }}</li>
                    <li>@{{ order . surname }}</li>
                    <li>@{{ order . address }}</li>
                    <li>@{{ order . phone_number }}</li>
                    <li>@{{ order . total_price }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
