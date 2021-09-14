@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="text-right mr-3">
            <a class="border rounded-circle p-2" href="{{ route('admin.orders.stats') }}"><i
                    class="fas fa-chart-line"></i></a>
        </div>

        <h1 class="text-center">I tuoi ordini</h1>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nome e Cognome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Data</th>
                    <th scope="col">Piatti</th>
                    <th scope="col">Totale Ordine</th>
                </tr>
            </thead>
            <tbody v-for="order in orders" v-if="order.user_id ===  {{ $user->id }}">
                <tr>
                    <td>@{{ order . name }} @{{ order . surname }}</td>
                    <td>@{{ order . address }}</td>
                    <td>@{{ order . phone_number }}</td>
                    <td>@{{ order . day }}-@{{ order . month_number }}-@{{ order . year }}</td>
                    <td>
                        <div v-if="order.dishes[0]">
                            <div v-for="dish in order.dishes">@{{ dish . name }} {{-- x @{{ dish . pivot . quantity }} --}}</div>
                        </div>
                    </td>
                    <td>@{{ order . total_price }} €</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
