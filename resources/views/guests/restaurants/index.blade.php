@extends('layouts.app')

@section('content')
    <div class="container">

        <nav class="navbar navbar-light bg-light justify-content-center">
            <form  @submit.prevent="view" class="form-inline">
                <input id="search-focus" type="search" id="form1" class="form-control mr-sm-2" placeholder="Cerca un ristorante" v-model="search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </nav>

        <h3 class="d-flex mt-5 mb-3 justify-content-center">CATEGORIE</h3>
        <div class="d-flex justify-content-center flex-wrap text-center border-bottom pt-2">
            <span v-for='(category,index) in categories' v-on:click="selected(index)" :class="category.isSelected ? 'selected' : ''">@{{category.name}} </span>
        </div>
        
        <h3 class="d-flex mt-5   justify-content-center">RISTORANTI</h3>
        <div class="d-flex text-center flex-wrap justify-content-center">
            <div v-for='user in users' class="card col-md-5 m-3">
                <a :href="'/' + user.id">
                    <h2 class="text-capitalize mb-0 p-1">@{{ user . restaurant_name }}</h2>
                    {{-- <img :src="'storage/' + user.restaurant_image" alt=""> --}}
                </a>
            </div>
        </div>

        {{-- {{ $users->links() }} --}}

    </div>

@endsection
