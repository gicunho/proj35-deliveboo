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
        dishes: null,
        search: "",
        first_page: 1,
        current_page: null,
        last_page: null,
        apiCategories: [],
        selectedInApi: '',
        cart: localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [],
        total_price: localStorage.getItem('total_price') ? JSON.parse(localStorage.getItem('total_price')) : 0,
        show: true,
    },
    methods: {
        // Search bar
        view() {
            axios.get(`/api/users?page=1&search=${this.search}${this.selectedInApi}`)
                .then(response => {
                    this.users = response.data.data
                    this.current_page = response.data.meta.current_page;
                    this.last_page = response.data.meta.last_page;
                });
        },
        // Next page
        next() {
            if (this.current_page != this.last_page) {
                axios.get(`/api/users?page=${this.current_page + 1}&search=${this.search}${this.selectedInApi}`)
                    .then(response => {
                        this.users = response.data.data
                        this.current_page = response.data.meta.current_page;
                        this.last_page = response.data.meta.last_page;
                    });
            }
        },
        // Previous page
        prev() {
            if (this.current_page != 1) {
                axios.get(`/api/users?page=${this.current_page - 1}&search=${this.search}${this.selectedInApi}`)
                    .then(response => {
                        this.users = response.data.data
                        this.current_page = response.data.meta.current_page;
                        this.last_page = response.data.meta.last_page;
                    });
            }
        },
        // First page
        first() {
            axios.get(`/api/users?page=${this.first_page}&search=${this.search}${this.selectedInApi}`)
                .then(response => {
                    this.users = response.data.data
                    this.current_page = response.data.meta.current_page;
                    this.last_page = response.data.meta.last_page;
                });
        },
        // Last page
        last() {
            axios.get(`/api/users?page=${this.last_page}&search=${this.search}${this.selectedInApi}`)
                .then(response => {
                    this.users = response.data.data
                    this.current_page = response.data.meta.current_page;
                    this.last_page = response.data.meta.last_page;
                });
        },
        // Add selected class to category
        selected(index) {
            if (this.categories[index].isSelected == false) {
                return this.categories[index].isSelected = true;
            }
            else
                return this.categories[index].isSelected = false;
        },
        // Change api call based on selection
        apiSelected(index) {
            this.selectedInApi = '';
            if (!this.apiCategories.includes(this.categories[index].slug)) {
                this.apiCategories.push(this.categories[index].slug);
            }
            else {
                this.apiCategories.forEach((category, i) => {
                    if (category === this.categories[index].slug) {
                        this.apiCategories.splice(i, 1);
                    }
                })
            }
            this.apiCategories.forEach(category => {
                this.selectedInApi = this.selectedInApi + '&search_category[]=' + category;
            })
        },
        addToCart(dish, id) {
            if (this.cart.length > 0) {
                if (this.cart[0].user_id === id) {
                    var ind = null;
                    this.cart.forEach((el, index) => {
                        if (dish.id === el.id) {
                            ind = index;
                        }
                    });
                    if (ind === null) {
                        this.cart.push(dish);
                    } else {
                        this.cart[ind].quantity += 1; //dish
                    }

                    var price = parseFloat(dish.price);
                    this.total_price += price;
                    this.total_price = Math.round(this.total_price * 100) / 100;
                    localStorage.setItem('cart', JSON.stringify(this.cart));
                    localStorage.setItem('total_price', JSON.stringify(this.total_price));
                }
                else {
                    if (confirm('Aggiungendo qualcosa da un nuovo ristorante svuoterai il precedente carrello, continuare?')) {
                        this.cart = [];
                        this.total_price = 0;
                        this.cart.push(dish);
                        var price = parseFloat(dish.price);
                        this.total_price += price;
                        this.total_price = Math.round(this.total_price * 100) / 100;
                        localStorage.setItem('cart', JSON.stringify(this.cart));
                        localStorage.setItem('total_price', JSON.stringify(this.total_price));
                    }
                }
            } else {
                this.cart.push(dish);
                var price = parseFloat(dish.price);
                this.total_price += price;
                this.total_price = Math.round(this.total_price * 100) / 100;
                localStorage.setItem('cart', JSON.stringify(this.cart));
                localStorage.setItem('total_price', JSON.stringify(this.total_price));
            }
        },
        removeFromCart(dish) {
            var ind = null;
            this.cart.forEach((el, index) => {
                if (dish.id === el.id) {
                    ind = index;
                }
            });

            if (ind === null) {
            } else {
                if (this.cart[ind].quantity == 1) { //dish
                    this.cart.splice(ind, 1);
                } else {
                    this.cart[ind].quantity -= 1; //dish
                }
                var price = parseFloat(dish.price);
                this.total_price -= price;
                this.total_price = Math.round(this.total_price * 100) / 100;
                localStorage.setItem('cart', JSON.stringify(this.cart));
                localStorage.setItem('total_price', JSON.stringify(this.total_price));
            }
        },
        deleteDish(dish, index) {
            var ind = null;
            this.cart.forEach((el, index) => {
                if (dish.id === el.id) {
                    ind = index;
                }
            });

            var price = parseFloat(dish.price * this.cart[ind].quantity); //dish
            this.total_price -= price;
            this.total_price = Math.round(this.total_price * 100) / 100;
            this.cart.splice(index, 1);
            this.cart[ind].quantity = 1; // dish
            localStorage.setItem('cart', JSON.stringify(this.cart));
            localStorage.setItem('total_price', JSON.stringify(this.total_price));
        },
        emptyCart() {
            if (confirm('Confermi di voler svuotare il carrello?')) {
                this.cart.forEach((dish, ind) => {
                    this.cart[ind].quantity = 1; //dish
                })
                this.cart = [];
                this.total_price = 0;
                localStorage.setItem('cart', JSON.stringify(this.cart));
                localStorage.setItem('total_price', JSON.stringify(this.total_price));
            }
        },
        resetCategories() {
            this.selectedInApi = '';
            this.apiCategories = [];
            this.categories.forEach(category => {
                category.isSelected = false;
            });
            axios.get(`/api/users?page=1&search=${this.search}${this.selectedInApi}`)
                .then(response => {
                    this.users = response.data.data
                    this.current_page = response.data.meta.current_page;
                    this.last_page = response.data.meta.last_page;
                });
        }
    },
    mounted() {
        axios.get('/api/users').then(resp => {
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
            this.dishes = resp.data.data;
        }).catch(e => {
            console.error('Sorry! ' + e);
        })
    },

});



//braintree payment
var button = document.querySelector('#submit-button');

braintree.dropin.create({
    authorization: 'sandbox_d55rz6pj_hp7cqf8qtnfz6934',
    selector: '#dropin-container',
    vaultManager: true,
    card: {
        amount: 5001.01,
        cardholderName: {
            required: true
        },
    }

}, function (err, instance) {
    button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
            sendNonceToServer(nonce, function (transactionError, response) {
                if (transactionError) {
                    // Clear selected payment method and add a message
                    // to the checkout page about the failure.
                    dropinInstance.clearSelectedPaymentMethod();
                    errorMessagesDiv.textContent = 'Transazione fallita. Seleziona un altro metodo di pagamente.';
                } else {
                    // Success
                }
            });
        });
    })
});
