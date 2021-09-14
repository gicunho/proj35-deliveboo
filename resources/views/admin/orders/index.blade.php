
@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="text-right mr-3">
            <a class="border rounded-circle p-2" href="{{ route('admin.orders.stats') }}"><i class="fas fa-chart-line"></i></a>
        </div>

        <h1 class="text-center">I tuoi ordini</h1>
<<<<<<< HEAD

        <div class="d-flex flex-wrap justify-content-center">
            <div class="card shadow p-3 mb-5 bg-white rounded col-md-5 m-3 p-3" v-for="order in orders" v-if="order.user_id ===  {{ $user->id }}">
                <div class="d-flex">
                    <h4 class="mr-2">@{{ order.name }}</h4>
                    <h4>@{{ order.surname }}</h4>
                </div>
                <h6>Indirizzo: @{{ order.address }}</h6>
                <h6>Telefono: @{{ order.phone_number }}</h6>
                <h6>Prezzo: @{{ order.total_price }}$</h6>
                <h6>Data: @{{order.date}}</h6>
            </div>
        </div>
=======
          
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nome e Cognome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Data</th>
                <th scope="col">Totale Ordine</th>
              </tr>
            </thead>
            <tbody v-for="order in orders" v-if="order.user_id ===  {{ $user->id }}">
              <tr>
                <td>@{{order.name}} @{{order.surname}}</td>
                <td>@{{order.address}}</td>
                <td>@{{order.phone_number}}</td>
                <td>@{{order.month}}</td>
                <td>@{{order.total_price}} €</td>
              </tr>
            </tbody>
          </table>
>>>>>>> d97f6955a41eb0edcb7d8fa3f1bf446be3c3df7c
    </div>
@endsection
