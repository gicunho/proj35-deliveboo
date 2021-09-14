@extends('layouts.app')

@section('content')

    <div class="container">
        <h4>Riepilogo dell'ordine</h4>
        <div v-for="el in cart">
            <p>@{{el.name}} x @{{el.quantity}}</p>
        </div>

        <div>
            <h3>Totale: € @{{total_price}}</h3>
        </div>

<!-- card details box -->
        <div id="dropin-container">
            
        </div>
        <button id="submit-button" class="btn btn-success">Ordina</button>

@endsection

<script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.js"></script>


