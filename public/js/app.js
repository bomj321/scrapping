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


/*********JQUERY EVENTOS*********/

/*********JQUERY EVENTOS*********/

/*VUEJS*/

new Vue({
	el: '#list_products',
	created: function() {
		this.getProducts();
	},
	data: {
		products: [],

	},
	methods: {
		getProducts: function() {
			var urlProducts = 'products';
			axios.get(urlProducts).then(response => {
				this.products = response.data.products
			});
		}
	}
});

/*VUEJS*/
