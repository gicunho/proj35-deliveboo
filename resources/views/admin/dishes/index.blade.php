@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-2">
            <h2>All dishes</h2>
            <a class='btn btn-primary' href="{{route('admin.dishes.create', $user->id)}}"><i class="fas fa-plus"></i> Add a dish</a>
        </div>

        <table class="table">
            <thead>
                <tr>

                    <th>NOME</th>
                    <th>IMMAGINE</th>
                    <th>PREZZO</th>
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>

                @foreach($dishes->sortBy('name') as $dish)
                    @if($user->id == $dish->user_id)
                        <tr>
                            <td>{{$dish->name}}</td>
                            <td><img  width="100" src="{{asset('storage/' . $dish->image )}}" alt=""></td>
                            <td>€ {{$dish->price}}</td>
                            <td class="d-flex">
                                <a href="{{route('admin.dishes.show', $dish->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.dishes.edit', $dish->id)}}" class="btn btn-secondary mx-1"><i class="fas fa-pen"></i></a>
                                <form action="{{route('admin.dishes.destroy', $dish->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection