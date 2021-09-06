@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Statistiche ordini</h1>
                <div>
                    <a href="{{route('admin.orders.index')}}"> <i class="fas fa-long-arrow-alt-left">Torna ai tuoi ordini</i></a>
                </div>
            </div>
        </div>
    </div>


@endsection
