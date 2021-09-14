@extends('layouts.app')

@section('content')

    <!-- jumbotron -->
    <div class="container-fluid jumbo-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-12 left_j" id="slide_in_l">
                <h1>Ci pensiamo noi.</h1>
                <p class="lead">Il delivery <em>veloce</em> <br> per quando l'appetito chiama</p>
            </div>
            <!-- jumbo img -->
            <div class="col-lg-6 col-sm-12 right">
                <div class="search_card">
                    <h3>Cerca il tuo ristorante preferito</h3>
                    @if (Route::currentRouteName() == 'restaurants')
                    <div class="searchbar">
                        <form @submit.prevent="view">
                            <input id="search-focus" type="search" id="form1" placeholder="Cerca"
                                v-model="search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row cat_search">
        <div class="col-lg-12 col-sm-12">
            <h3>Oppure cerca per categorie:</h3>
        </div>
    </div>
    <!-- /jumbotron -->

    <div class="restaurant_container container">
        <div class="row justify-content-center">
            <div class="col-12 categories">
                <div class="row">
                    <div class="category col-lg-1 col-md-2 col-4" v-for='(category,index) in categories' v-on:click="selected(index); apiSelected(index); view(index);" :class="category.isSelected ? 'selected' : ''">
                        <img :src="'img/' + category.emoji" alt="">
                        <h5>@{{category.name}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4" v-if="selectedInApi">
            <div class="col-12 d-flex justify-content-center">
                <button class="btn deselect" @click="resetCategories()">Deseleziona tutto</button>
            </div>
        </div>

        <h1>RISTORANTI</h1>
        <div class="restaurants">
            <div  v-for='user in users ' class='col-lg-4 col-md-6 col-12'>
                <a :href="'/' + user.id">
                <div class="restaurant"  :style="{ backgroundImage: 'url(\'storage/' + user.restaurant_image + '\')' }">
                </div>
                    <h4>@{{ user . restaurant_name }}</h4>
                </a>
            </div>
        </div>

        <nav aria-label="Page navigation" class="d-flex justify-content-around">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" aria-label="Previous" v-on:click="first">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" v-on:click="prev" v-if="current_page > 1">@{{ current_page - 1 }}</a>
                </li>
                <li class="page-item">
                    <a class="page-link">@{{ current_page }}</a>
                </li>
                <li class="page-item">
                    <a class="page-link" v-on:click="next" v-if="current_page < last_page">@{{ current_page + 1 }}</a>
                </li>
                <li class="page-item">
                    <a class="page-link" aria-label="Next" v-on:click="last">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

@endsection
