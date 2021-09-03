@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="input-group">
            <div class="form-outline">
                <input id="search-focus" type="search" id="form1" class="form-control" placeholder="Cerca un ristorante"
                    v-model="search" />
            </div>
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div class="d-flex">
            @foreach ($categories as $category)
                <a href="{{ route('categories.show', $category->id) }}">
                    <h2>{{ $category->name }}</h2>
                    {{-- <span>{{ $category->emoji }}</span> --}}
                </a>
            @endforeach
        </div>

        <div v-for='user in users' class="card"
            v-if="(user.restaurant_name.toLowerCase().includes(search.toLowerCase()) || search == '')">
            <a :href="'/' + user.id">
                <h2>@{{ user . restaurant_name }}</h2>
                <img :src="'storage/' + user.restaurant_image" alt="">
            </a>
        </div>

        {{-- {{ $users->links() }} --}}

    </div>



@endsection
