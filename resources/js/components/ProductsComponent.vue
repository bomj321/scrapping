<template>
  <div class="row" :key="componentKey">
      <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12" v-for="product in products">
              <div class="card text-center">
                  <div class="card-header">
                    <h4><div class="product_seccion">{{ product.seccion }}</div> <span class="circulo_rebaja">{{ product.descuento }}%</span> </h4>
                    {{ product.modelo }}
                  </div>
                    <div class="card-body">
                      <a v-bind:href="product.link" target="_blank">
                        <img  v-bind:src="product.imagen">
                      </a>
                    </div>
                  <div class="card-footer text-muted">
                    <a v-bind:href="product.link" type="button" class="btn button_product_talla"> {{ product.talla }}</a>
                    <p><span class="precio_linea"> {{ product.precio_anterior }}$</span> <span class="span_precio">{{ product.precio_oferta }}$</span></p>
                    <a v-bind:href="product.link" type="button" class="btn btn-dark btn-block btn-lg button_product">COMPRAR <span><i class="fab fa-amazon"></i></span></a>
                  </div>
                </div>
      </div>

      <br>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <infinite-loading @distance="1" @infinite="infiniteHandler">
                <div slot="no-more">No hay mas Resultados</div>
                <div slot="no-results">Sin resultados</div>
            </infinite-loading>
      </div>

  </div>
</template>

<script>

    export default {      

          data() {
                return {
                    products: [],
                    page: 0,
                    componentKey: 0,                    
                }
            },
            methods: {
              infiniteHandler($state) { 

                this.page++ 


/**************INICIAR EVENTOS*******************/
                var valueSelects = [];

                $('.multiselect__element span.multiselect__option--selected').map(function()
                 {
                         valueSelects.push($(this).text());
                 }).get();

                 if (valueSelects.length == 0 || valueSelects == undefined ) {



                              var url = 'products?page='+this.page
                              axios.get(url)
                              .then(response => {

                                  let list_products = response.data.products.data;

                                  if(list_products.length){
                                      this.products = this.products.concat(list_products);
                                      $state.loaded();
                                  }else{
                                      $state.complete();
                                  }
                              }) 

                   }else{
                          var array_string = valueSelects.join('&busqueda[]=');
                          var url = 'products?page='+this.page+"&busqueda[]="+array_string   

                          axios.get(url)
                          .then(response => {

                              let list_products = response.data.products.data;

                              if(list_products.length){
                                  this.products = this.products.concat(list_products);
                                  $state.loaded();
                              }else{
                                  $state.complete();
                              }
                          })
                  }                        


/**************INICIAR EVENTOS*******************/

                 
/**********************EMITIR EVENTOS DESPUES DEL CLICK****************************/
                  EventBus.$on('filter', (valueSelects) => { 

                          //this.$destroy();
                          this.page = 1;
                          this.products = [];
                          this.infiniteHandler($state);


               });


/**********************EMITIR EVENTOS DESPUES DEL CLICK****************************/
              },


                   
             
            }

           

    }
</script>
