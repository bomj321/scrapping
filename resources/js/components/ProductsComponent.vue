<template>
  <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12" v-for="product in products">
              <div class="card text-center">
                  <div class="card-header">
                    <h4><div class="product_seccion">{{ product.seccion }}</div> <span class="circulo_rebaja">{{ product.descuento }}%</span> </h4>
                    {{ product.modelo }}
                  </div>
                    <div class="card-body">
                        <img  v-bind:src="product.imagen">
                    </div>
                  <div class="card-footer text-muted">
                    <a v-bind:href="product.link" type="button" class="btn button_product_talla"> {{ product.talla }}</a>
                    <p><span class="precio_linea"> {{ product.precio_anterior }}$</span> <span class="span_precio">{{ product.precio_oferta }}$</span></p>
                    <a v-bind:href="product.link" type="button" class="btn btn-dark btn-block btn-lg button_product">COMPRAR <span><i class="fab fa-amazon"></i></span></a>
                  </div>
                </div>
      </div>
  </div>
</template>

<script>
    export default {
          created: function() {
            this.getProducts();
          },
          data() {
              return {
                  products: []
              }
          },
          methods: {
            getProducts: function() {
              var urlProducts = 'products?page=1';
              axios.get(urlProducts).then(response => {
                this.products = response.data.products.data
              });
            }
          }
    }
</script>
