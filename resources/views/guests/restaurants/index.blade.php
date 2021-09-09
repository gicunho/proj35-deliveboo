@extends('layouts.app')

@section('content')

    <div class="restaurant_container">

        <div class="categories">
            <a href="#" class="category" v-for='(category,index) in categories' v-on:click="selected(index)" :class="category.isSelected ? 'selected' : ''">
                <img :src="'img/' + category.emoji" alt="">
                <h5>@{{category.name}}</h5>
            </a>
        </div>

        <div class="restaurants">
            <h1>RISTORANTI</h1>
            <div class="restaurant" v-for='user in users'>
                <a :href="'/' + user.id">
                    <h2>@{{ user . restaurant_name }}</h2>
                    <img src="" alt="">
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
