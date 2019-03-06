
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.component('products', require('./components/ProductsComponent.vue').default);
Vue.component('infinite', require('vue-infinite-loading'));

window.Multiselect = require('bootstrap-multiselect');
/*********SECCION DE LOS FILTROS******************/
  $(document).ready(function() {
        $('#select1').multiselect({
        	buttonClass: 'btn btn-secondary',
        	includeResetOption: true,
            includeResetDivider: true,
            buttonWidth: '100%',
            maxHeight: 350

        });

         $('#select2').multiselect({
        	buttonClass: 'btn btn-secondary',
        	includeResetOption: true,
            includeResetDivider: true,
            buttonWidth: '100%',
            maxHeight: 350

        });


         $('#select3').multiselect({
        	buttonClass: 'btn btn-secondary',
        	includeResetOption: true,
            includeResetDivider: true,
            buttonWidth: '100%',
            maxHeight: 350

        });

          $('#select4').multiselect({
        	buttonClass: 'btn btn-secondary',
        	includeResetOption: true,
            includeResetDivider: true,
            buttonWidth: '100%',
            maxHeight: 350

        });

           $('#select5').multiselect({
        	buttonClass: 'btn btn-secondary',
        	includeResetOption: true,
            includeResetDivider: true,
            buttonWidth: '100%',
            maxHeight: 350

        });
    });
/*********SECCION DE LOS FILTROS******************/





const app = new Vue({
  el: '#list_products'

});
