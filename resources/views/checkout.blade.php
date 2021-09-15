@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="d-flex col-12">
                <div class="col-8 pl-0 mt-3">
                    <div class="border-bottom">
                        <h6>DETTAGLI PAGAMENTO</h6>
                    </div>

                    <div id="dropin-container">   
                    </div>

                    <button id="submit-button" class="btn btn-success" @click="setTimeout(pay(),500)">
                        <h5 class="mb-0">Paga & Ordina</h5>
                    </button>

                    <a href="{{ url('/') }}" id="home" style="display: none" @click="emptyCartNoConfirm()">
                        <button id="home" class="btn btn-primary"><h5 class="mb-0">Torna alla home</h5></button>
                    </a>
                </div>
        
                <div class="col-3 ml-5 mt-3">
                    <div class="border-bottom mb-4">
                        <h6>RIEPILOGO DELL'ORDINE</h6>
                    </div>
                    <div v-for="el in cart">
                        <p class="mb-2 d-flex align-items-center">
                            <span class="mr-2" style="font-size: 5px">•</span> 
                            @{{el.name}} x @{{el.quantity}}
                        </p>
                    </div>
            
                    <div>
                        <h3 class="mt-3">Totale: € @{{total_price}}</h3>
                    </div>
                </div>
            </div>
        </div>        
    </div>

@endsection

<script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.js"></script>


