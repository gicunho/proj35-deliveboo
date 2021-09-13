@extends('layouts.app')

@section('content')
    <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.js"></script>

    <div class="container">
        <div>Riepilogo Ordine:</div>
        <div v-for="el in cart">
            <div>@{{el.name}} x @{{el.quantity}}</div>            
        </div>
    
        <div>Stai per pagare € @{{total_price}}</div>

        

        <div id="dropin-container" class="col-6"></div>
        <button id="submit-button" class="button button--small button--green">Purchase</button>
    </div>
@endsection