@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Conferma il tuo ordine</h1>
                <h5>Inserisci i dati per la consegna</h5>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group d-none">
                    <select id="dishes" type="" class="form-control @error('dishes') is-invalid @enderror" name="dishes[]"  required multiple maxlength='40'>
                            <option :value="dishes.id" selected  v-for='dishes in cart'>@{{dishes.name}} x @{{dishes.quantity}}</option>
                        </select>
                    </div>
                    <div class='d-none'>
                    <select id="dishes" type="" class="form-control @error('dishes') is-invalid @enderror" name="quantity[]"  required multiple maxlength='40'>
                        <option :value="dishes.quantity" selected  v-for='dishes in cart'>@{{dishes.name}} x @{{dishes.quantity}}</option>
                    </select>
                    </div>
    
                    <div class="form-group row">
                        <label for="name" class="col-md-12 col-form-label ">{{ __('Nome *') }}</label>
                        <div class="col-12 col-md-6">
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" required minlength='2' maxlength="50" value="{{ old('name') }}">
                            <small id="nameHelper" class="form-text text-muted col-12 col-md-6 px-0">Inserisci il tuo nome</small>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="surname" class="col-md-12 col-form-label ">{{ __('Cognome *') }}</label>
                        <div class="col-12 col-md-6">
                            <input id="surname" type="surname" class="form-control @error('surname') is-invalid @enderror" name="surname" required minlength='2' maxlength="50" value="{{ old('surname') }}">
                            <small id="surnameHelper" class="form-text text-muted col-12 col-md-6 px-0">Inserisci il tuo cognome</small>
                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-12 col-form-label ">{{ __('Indirizzo *') }}</label>
                        <div class="col-12 col-md-6">
                            <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required minlength='2' maxlength="50" value="{{ old('address') }}">
                            <small id="addressHelper" class="form-text text-muted col-12 col-md-6 px-0">Inserisci l'indirizzo di consegna</small>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-md-12 col-form-label ">{{ __('Numero di telefono *') }}</label>
                        <div class="col-12 col-md-6">
                            <input id="phone_number" type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required minlength='2' maxlength="50" value="{{ old('phone_number') }}">
                            <small id="phone_numberHelper" class="form-text text-muted col-12 col-md-6 px-0">Inserisci il tuo numero di telefono</small>
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row d-none">
                        <label for="total_price" class="col-md-12 col-form-label ">{{ __('Indirizzo *') }}</label>
                        <div class="col-12 col-md-6">
                            <input id="total_price" type="number" step='0.01' class="form-control @error('total_price') is-invalid @enderror" name="total_price" required :value="total_price">
                        </div>
                    </div>
                    <div class="form-group row d-none">
                        <label for="user_id" class="col-md-12 col-form-label ">{{ __('Indirizzo *') }}</label>
                        <div class="col-12 col-md-6">
                            <input id="user_id" type="number" step='0.01' class="form-control @error('user_id') is-invalid @enderror" name="user_id" required :value="cart[0].user_id">
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Conferma</button>
            </form>
    </div>
@endsection