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
        <div class="d-flex justify-content-center flex-wrap text-center shadow bg-white rounded">
            <h4 class="p-4 category_select" v-for='(category,index) in categories' v-on:click="selected(index); apiSelected(index); view()" :class="category.isSelected ? 'selected' : ''">@{{category.name}}</h4>
        </div>
        
        <h3 class="d-flex mt-5 justify-content-center">RISTORANTI</h3>
        <div class="d-flex text-center flex-wrap justify-content-center">
            <div v-for='user in users' class="card col-md-5 m-3 shadow p-3 mb-5 bg-white rounded">
                <a :href="'/' + user.id">
                    <h2 class="text-capitalize mb-0 p-1">@{{ user . restaurant_name }}</h2>
                    {{-- <img :src="'storage/' + user.restaurant_image" alt=""> --}}
                </a>
            </div>
        </div>

        <nav aria-label="Page navigation" class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" aria-label="Previous" v-on:click="first">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" v-on:click="prev" v-if="current_page > 1">@{{ current_page - 1 }}</a></li>
                <li class="page-item"><a class="page-link">@{{ current_page }}</a></li>
                <li class="page-item"><a class="page-link" v-on:click="next" v-if="current_page < last_page">@{{ current_page + 1 }}</a></li>
                <li class="page-item">
                    <a class="page-link" aria-label="Next" v-on:click="last">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

@endsection
