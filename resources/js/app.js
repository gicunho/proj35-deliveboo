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
        page: 1,
    },
    methods: {
        view() {
            axios.get(`/api/users?page=${this.page}&search=${this.search}`)
                .then(response => this.users = response.data.data);
        },
        selected(index) {
            if (this.categories[index].isSelected == false) {
                this.users.forEach(user => {
                    user.categories.forEach(category => {
                        if (category.name == this.categories[index].name) {
                            category.isSelected = true;
                            console.log(category.isSelected);
                        }
                    });
                })
                return this.categories[index].isSelected = true;
            }
            else {
                this.users.forEach(user => {
                    user.categories.forEach(category => {
                        if (category.name == this.categories[index].name) {
                            category.isSelected = false;
                            console.log(category.isSelected);
                        }
                    });
                })
                return this.categories[index].isSelected = false;
            }
        }
    },
    mounted() {
        axios.get('/api/users').then(resp => {
            this.users = resp.data.data;
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
    },

});


