/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');
const { forEach } = require('lodash');


require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        users: null,
        orders: null,
        categories: null,
        search: "",
        first_page: 1,
        current_page: null,
        last_page: null,
        dishes: null,
        cart: [],

    },
    methods: {
        aggiungi(dish, index){
            if (this.cart.includes(dish)) {
                dish.quantity += 1;
            } else {
            this.cart.push(dish);
            console.log(this.cart);
            }
        },
        view() {
            axios.get(`/api/users?page=1&search=${this.search}`)
                .then(response => {
                    this.users = response.data.data
                    this.current_page = response.data.meta.current_page;
                    this.last_page = response.data.meta.last_page;
                });
        },
        next() {
            if (this.current_page != this.last_page) {
                axios.get(`/api/users?page=${this.current_page + 1}&search=${this.search}`)
                    .then(response => {
                        this.users = response.data.data
                        this.current_page = response.data.meta.current_page;
                        this.last_page = response.data.meta.last_page;
                    });
            }
        },
        prev() {
            if (this.current_page != 1) {
                axios.get(`/api/users?page=${this.current_page - 1}&search=${this.search}`)
                    .then(response => {
                        this.users = response.data.data
                        this.current_page = response.data.meta.current_page;
                        this.last_page = response.data.meta.last_page;
                    });
            }
        },
        first() {
            axios.get(`/api/users?page=${this.first_page}&search=${this.search}`)
                .then(response => {
                    this.users = response.data.data
                    this.current_page = response.data.meta.current_page;
                    this.last_page = response.data.meta.last_page;
                });
        },
        last() {
            axios.get(`/api/users?page=${this.last_page}&search=${this.search}`)
                .then(response => {
                    this.users = response.data.data
                    this.current_page = response.data.meta.current_page;
                    this.last_page = response.data.meta.last_page;
                });
        },
        selected(index) {
            if (this.categories[index].isSelected == false) {
                return this.categories[index].isSelected = true;
            }
            else
                return this.categories[index].isSelected = false;
        }
    },
    mounted() {
        axios.get('/api/users').then(resp => {
/*             console.log(resp);*/            
            this.users = resp.data.data;
            this.current_page = resp.data.meta.current_page;
            this.last_page = resp.data.meta.last_page;

        }).catch(e => {
            console.error('Sorry! ' + e);
        })
        axios.get('/api/orders').then(resp => {
            this.orders = resp.data.data;
        }).catch(e => {
            console.error('Sorry! ' + e);
        })
        axios.get('/api/categories').then(resp => {
            this.categories = resp.data.data;
            this.categories.forEach(category => category.isSelected = false);
        }).catch(e => {
            console.error('Sorry! ' + e);
        })
        axios.get('/api/dishes').then(resp => {
            resp.data.forEach(element => {
                if (element.user_id == {{$user->id}}) {
                    list.push(element);  
                }
            this.dishes = resp.data.data;
            console.log(this.dishes);
        }).catch(e => {
            console.error('Sorry! ' + e);
        })
    },

});


