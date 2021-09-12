@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 left" id="slide_in_l">
                <h1>Ci pensiamo noi.</h1>
                <p class="lead">Il delivery veloce <br> per quando l'appetito chiama</p>
                <!-- searchbar -->
            </div>
            <!-- jumbo img -->
            <div class="col-lg-6 right">
                <img id="hero_img" src="../../../img/jumbo_img.png" alt="">
            </div>
        </div>
    </div>

    <div class="restaurant_container container">
        <div class="row justify-content-center">
            <div class="col-12 categories">
                <div class="row">
                    <div class="category col-lg-1 col-md-2 col-3" v-for='(category,index) in categories' v-on:click="selected(index); apiSelected(index); view(index);" :class="category.isSelected ? 'selected' : ''">
                        <img :src="'img/' + category.emoji" alt="">
                        <h5>@{{category.name}}</h5>
                    </div>
                </div>
            </div>
        </div>

        <h1>RISTORANTI</h1>
        <div class="restaurants">
            <div  v-for='user in users ' class='col-4'>
                <a :href="'/' + user.id">
                <div class="restaurant"  :style="{ backgroundImage: 'url(\'storage/' + user.restaurant_image + '\')' }">
                </div>
                    <h4>@{{ user . restaurant_name }}</h4>
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
