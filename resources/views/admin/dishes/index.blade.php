@extends('layouts.admin')

@section('content')
<h1 class="text-center">I tuoi piatti</h1>

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


