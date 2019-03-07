
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.component('products', require('./components/ProductsComponent.vue').default);
Vue.component('infinite', require('vue-infinite-loading'));


import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

Vue.component('selectvue1', require('./components/Select1Component.vue').default);
Vue.component('selectvue2', require('./components/Select2Component.vue').default);
Vue.component('selectvue3', require('./components/Select3Component.vue').default);
Vue.component('selectvue4', require('./components/Select4Component.vue').default);






const app = new Vue({
  el: '#list_products'

});
