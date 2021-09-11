{{-- @extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-2">
            <h2>Tutti i piatti</h2>
            <a class='btn btn-primary' href="{{route('admin.dishes.create', $user->id)}}"><i class="fas fa-plus"></i> Aggiungi un piatto</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>IMMAGINE</th>
                    <th>PREZZO</th>
                    <th>VISIBILE</th>
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>

                @foreach($dishes->sortBy('name') as $dish)
                    @if($user->id == $dish->user_id)
                        <tr>
                            <td>{{$dish->name}}</td>
                            <td><img class="rounded" width="100" src="{{asset('storage/' . $dish->image )}}" alt=""></td>
                            <td>€ {{$dish->price}}</td>
                            <td>@if($dish->is_visible)
                                    Sì
                                @else
                                    No
                                @endif

                            </td>
                            <td class="d-flex">
                                <a href="{{route('admin.dishes.show', $dish->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.dishes.edit', $dish->id)}}" class="btn btn-secondary mx-1"><i class="fas fa-pen"></i></a>
                                <form action="{{route('admin.dishes.destroy', $dish->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare questo piatto?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection --}}

@extends('layouts.admin')

@section('content')
<div class="admin_dishes">
    <div class="container">
            @foreach ($dishes->sortBy('name') as $dish)
                @if ($user->id == $dish->user_id)
                    <table>
                        <tbody>
                            <tr>
                                <th> <h4>NOME</h4> </th>
                                <th> <h4>IMMAGINE</h4> </th>
                                <th> <h4>PREZZO</h4> </th>
                                <th> <h4>DESCRIZIONE</h4> </th>
                                <th> <h4>VISIBILE</h4> </th>
                            </tr>
                                <tr>
                                    <th> <span>{{$dish->name}}</span> </th>
                                    <th> <img class="rounded" width="120" src="{{asset('storage/' . $dish->image )}}" alt=""> </th>
                                    <th> <span>€ {{$dish->price}}</span> </th>
                                    <th> <span>{{$dish->description}}</span> </th>
                                    <th>
                                        @if($dish->is_visible)
                                            <span>Sì</span>
                                        @else
                                            <span>No</span>
                                        @endif
                                    </th>
                                </tr>   
                        </tbody>
                    </table>

                    
                    <form action="{{route('admin.dishes.show', $dish->id)}}" method="get">
                        <input type="submit" value="Guarda" class="blue">
                    </form>

                    <form action="{{route('admin.dishes.edit', $dish->id)}}" method="get">
                        <input type="submit" value="Modifica" class="green">
                    </form>

                    <form action="{{route('admin.dishes.destroy', $dish->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                
                        <input type="submit" value="Elimina" class="red">
                    </form>
                @endif
            @endforeach
    </div>
</div> 
@endsection


