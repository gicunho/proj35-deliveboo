@extends('layouts.admin')

@section('content')
<div class="d-flex flex-column align-items-center">
    <h1 class="text-center">I tuoi piatti</h1>
    <a href="{{route('admin.dishes.create')}}" class="btn btn-brand-secondary text-white">Aggiungi un nuovo piatto <i class="fa fa-plus" aria-hidden="true"></i></a>
</div>

<div class="admin_dishes">
    <div class="container">
            @foreach ($dishes->sortBy('name') as $dish)
                @if ($user->id == $dish->user_id)
                    <table>
                        <thead>
                            <tr>
                                <th> <h4>NOME</h4> </th>
                                <th> <h4>IMMAGINE</h4> </th>
                                <th> <h4>PREZZO</h4> </th>
                                <th> <h4>DESCRIZIONE</h4> </th>
                                <th> <h4>VISIBILE</h4> </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td> <span>{{$dish->name}}</span> </td>
                                    <td> <img class="rounded" width="120" src="{{asset('storage/' . $dish->image )}}" alt=""> </td>
                                    <td> <span>€ {{$dish->price}}</span> </td>
                                    <td>
                                        <div class="description_wrapper">
                                            <span class="description">{{$dish->description}}</span>    
                                        </div> 
                                    </td>
                                    <td>
                                        @if($dish->is_visible)
                                            <span>Sì</span>
                                        @else
                                            <span>No</span>
                                        @endif
                                    </td>
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


