
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./ui');

//get axios
var axios = require('axios');

//set laravel token to axios defaults to allow api calls
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
};

window.Vue = require('vue');

/**
 * Setup Toastr
 */
window.toastr = require('toastr');

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

//Set Vue Broadcaster
window.broadcaster = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Form Components
Vue.component(
    'load-pokemons-form',
    require('./components/LoadPokemonsForm.vue')
);

Vue.component(
    'store-filtered-pokemon-form',
    require('./components/StoreFilteredPokemonsForm.vue')
);

Vue.component(
    'highlight-pokemon-form',
    require('./components/HighlightPokemonsForm.vue')
);

//List Component
Vue.component(
    'highlighted-pokemon-list',
    require('./components/HighlightedPokemonsList.vue')
);

const app = new Vue({
    el: '#app'
});
