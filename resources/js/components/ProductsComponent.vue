<template>
    <div class="row cuerpo_pagina">
      <div id="demo">
      </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" v-for="product in products">
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
                        <a v-bind:href="product.link" type="button" class="btn button_product_talla" target="_blank"> {{ product.talla }}</a>
                        <p><span class="precio_linea"> {{ product.precio_anterior }}$</span> <span class="span_precio">{{ product.precio_oferta }}$</span></p>
                        <a v-bind:href="product.link" type="button" class="btn btn-dark btn-block btn-lg button_product" target="_blank">COMPRAR <span><i class="fab fa-amazon"></i></span></a>
                      </div>
                    </div>
          </div>
         


          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <infinite-loading @distance="1" @infinite="infiniteHandler" :identifier="infiniteId">
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
                    infiniteId: +new Date(),
                    valueSelectsEmitted: [], 
                    perc: null,
                    data: null,
                    relevanceScore:null,
                    numbers: []                 
                }
            },           
            mounted:function(){
              var vm = this
              window.addEventListener('scroll', function(e){
                var scrollPos = window.scrollY
                var winHeight = window.innerHeight
                var docHeight = document.documentElement.scrollHeight // instead document.body.clientHeight
                this.perc = 100 * scrollPos / (docHeight - winHeight)                

                if (perc > 70) {
                    $(".fixed-bottom").show(1000);;
                }
              })
            },methods: {
              infiniteHandler($state){ 
                this.page++ 

    /**********************EMITIR EVENTOS DESPUES DEL CLICK****************************/


/***********************EVENTO PARA LLENAR LOS FILTROS************************************/    
                      EventBus.$on('filter', (valueSelects) => { 
                                      this.page = 0;
                                      this.products = [];
                                      this.infiniteId += 1;    

                          if (valueSelects.length == 0 || valueSelects == undefined ) {
                                  this.valueSelects = null;
                          }else{                            

                                  for (var i = 0; i < valueSelects.length; i++) {
                                     this.valueSelectsEmitted.push(valueSelects[i]);                                                               
                                      
                                  }                            

                          } 

                   }); 

/***********************EVENTO PARA LLENAR LOS FILTROS************************************/

/****************************************EVENTO PARA VACIAR LOS FILTROS**********************/


                     EventBus.$on('filterOut', (valueSelects) => { 
                                      this.page = 0;
                                      this.products = [];
                                      this.infiniteId += 1;

                                   for(var i = 0; i < this.valueSelectsEmitted.length; i++){ 
                                         if (this.valueSelectsEmitted[i] === valueSelects) {
                                               this.valueSelectsEmitted.splice(i, 1);                                               
                                         }
                                       if (this.valueSelectsEmitted[i] == '') {
                                            this.valueSelectsEmitted.splice(i, 1); 
                                          }                                                                                             
        

                                  }                                          
                              
                            
                   }); 


/****************************************EVENTO PARA VACIAR LOS FILTROS**********************/

    /**********************EMITIR EVENTOS DESPUES DEL CLICK****************************/

/**************INICIAR PAGINACION*******************/ 

/****ELIMINAR DUPLICADOS DE LOS FILTROS YA QUE GENERA CONSULTA REPETIDA****/
  let valueSelectedWithOutDuplicates = this.valueSelectsEmitted.filter((valor, indiceActual, arreglo) => arreglo.indexOf(valor) === indiceActual);
/****ELIMINAR DUPLICADOS DE LOS FILTROS YA QUE GENERA CONSULTA REPETIDA****/


                         if (valueSelectedWithOutDuplicates.length == 0 || valueSelectedWithOutDuplicates == undefined) { 

                                      var url = 'products?page='+this.page
                                      axios.get(url)
                                      .then(response => {

                                          let list_products = response.data.products.data;

                                          if(list_products.length){
                                              this.data = response.data.products.total;
                                              this.products = this.products.concat(list_products);
                                              $state.loaded();
                                          }else{
                                              $state.complete();
                                          }
                                      }) 

                         }else{
                                var array_string = valueSelectedWithOutDuplicates.join('&busqueda[]=');
                                var url = 'products?page='+this.page+"&busqueda[]="+array_string   

                                axios.get(url)
                                .then(response => {

                                    let list_products = response.data.products.data;

                                    if(list_products.length){
                                        this.data = response.data.products.total;
                                        this.products = this.products.concat(list_products);
                                        $state.loaded();
                                    }else{
                                        $state.complete();
                                    }
                                })
                        }                        


/**************INICIAR PAGINACION*******************/
                 

              },               
             
            }

           

    }
</script>
