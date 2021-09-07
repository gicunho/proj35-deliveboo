@extends('layouts.admin')

@section('content')
    <div class="container mt-0">
        <h1 class="text-center">I tuoi dati</h1>

        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger col-md-8" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-5 card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                        <span>Nome ristorante: <h5 class="pl-2">- {{ $user->restaurant_name }}</h5></span>
                        <span>Email: <h5 class="pl-2">- {{ $user->email }}</h5></span>
                        <span>Indirizzo: <h5 class="pl-2">- {{ $user->address }}</h5></span>
                        <span>P.IVA: <h5 class="pl-2">- {{ $user->piva }}</h5></span>
                        <span>Numero di telefono: <h5 class="pl-2">- {{ $user->phone_number }}</h5></span>
                        <span>Categoria/e:</span>
                        @foreach ($user->categories as $category)
                            <h5 class="pl-2">- {{ $category->name }}</h5>
                        @endforeach
                        
                        @if ($user->restaurant_image)
                            <span>Immagine:</span> 
                            <img src="{{ $user->restaurant_image }}" alt="{{ $user->restaurant_name }}">    
                        @endif
                    
                </div>
            </div>
        </div>
    </div>
@endsection
