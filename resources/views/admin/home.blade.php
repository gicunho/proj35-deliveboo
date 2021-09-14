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
            <div class="col-md-4 card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4 pb-1 border-bottom">
                        <span style="font-size: 10px; width: 160px">NOME RISTORANTE: </span>
                        <h5 class="pl-2 mb-0">{{ $user->restaurant_name }}</h5>
                    </div>

                    <div class="d-flex align-items-center mb-4 pb-1 border-bottom">
                        <span style="font-size: 10px; width: 160px">P.IVA: </span>
                        <h5 class="pl-2 mb-0">{{ $user->piva }}</h5>
                    </div>

                    <div class="d-flex align-items-center mb-4 pb-1 border-bottom">
                        <span style="font-size: 10px; width: 160px">EMAIL: </span>
                        <h5 class="pl-2 mb-0">{{ $user->email }}</h5>
                    </div>

                    <div class="d-flex align-items-center mb-4 pb-1 border-bottom">
                        <span style="font-size: 10px; width: 160px">TELEFONO: </span>
                        <h5 class="pl-2 mb-0">{{ $user->phone_number }}</h5>
                    </div>

                    <div class="d-flex">
                        <div class="mr-5">
                            <span style="font-size: 10px">CATEGORIA/E:</span>
                            @foreach ($user->categories as $category)
                                <h6 class="pl-2">• {{ $category->name }}</h6>
                            @endforeach
                        </div> 

                        <div>
                            <span style="font-size: 10px">IMMAGINE:</span> 
                            <div class="px-2 py-1">
                                <img src="{{ asset('storage/' . $user->restaurant_image) }}" width="125" class="rounded" alt="{{ $user->restaurant_name }}">    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
