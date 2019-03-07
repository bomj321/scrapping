<!-- Vue component -->
<template>
  <div>
       <label class="typo__label">Marca</label>
      <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Escoja Alguno" label="name" track-by="name" :preselect-first="false">

            <template slot="selection" slot-scope="{ values, search, isOpen }">
              
              <span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} seleccionadas</span>

            </template>
      </multiselect>
  </div>
</template>

<script>
  import Multiselect from 'vue-multiselect'

export default {
  components: {
    Multiselect
  },
  data () {
    return {
      value: [],
      options: [
              { name : 'Adidas'},
              { name : 'Asics'},
              { name : 'Bdba'},
              { name : 'Betty Barclay Elements'},
              { name : 'Bikkembergs'},
              { name : 'Billabong'},
              { name : 'Blend'},
              { name : 'Brooks Brothers'},
              { name : 'Burberry'},
              { name : 'Burton'},
              { name : 'Calvin Klein'},
              { name : 'Camper'},
              { name : 'Carhartt'},
              { name : 'Carrera'},

              { name : 'Clarks'},
              { name : 'Converse'},
              { name : 'Columbia'},
              { name : 'Cortefiel'},
              { name : 'Dc'},
              { name : 'Desigual'},
              { name : 'Diesel'},
              { name : 'Dkny'},
              { name : 'Dockers'},
              { name : 'Dolores Promesas'},
              { name : 'Double Agent'},
              { name : 'Dr. Martens'},
              { name : 'El Ganso'},
              { name : 'Element'},


              { name : 'Etxart & Panno'},
              { name : 'Farrutx'},
              { name : 'Find'},
              { name : 'Fred Perry'},
              { name : 'Furla'},
              { name : 'G-Star Raw'},
              { name : 'Gant'},
              { name : 'Geographical Norway'},
              { name : 'Gucci'},
              { name : 'Guess'},
              { name : 'Hackett London'},
              { name : 'Helly Hansen'},
              { name : 'Hugo Boss'},
              { name : 'Hummel'},

              { name : 'Hurley'},
              { name : 'Ichi'},
              { name : 'Jack & Jones'},
              { name : 'Jimmy Choo'},
              { name : 'Joma'},
              { name : 'Kangaroos'},
              { name : 'Kappa'},
              { name : 'Karen Millen'},
              { name : 'Lacoste'},
              { name : 'Le Coq Sportif'},
              { name : 'Lee'},



              { name : 'Levis'},
              { name : 'Liu Jo'},
              { name : 'Michael Kors'},
              { name : 'Moschino'},
              { name : 'Munich'},
              { name : 'Naf Naf'},
              { name : 'New Balance'},
              { name : 'Nike'},
              { name : 'Oakley'},
              { name : "O' Neill"},
              { name : 'Panama Jack'},
              { name : 'Pedro del Hierror'},
              { name : 'Pepe Jeans'},


              { name : 'Prada'},
              { name : 'Puma'},
              { name : 'Quiksilver'},
              { name : 'Rains'},
              { name : 'Ralph Lauren'},
              { name : 'Ray-ban'},
              { name : 'Reebok'},
              { name : 'Roxy'},
              { name : 'Salsa'},
              { name : 'Scalpers'},





              { name : 'Skechers'},
              { name : 'Springfield'},
              { name : 'Superdry'},
              { name : 'Superga'},
              { name : 'Ted Baker'},
              { name : 'The North Face'},
              { name : 'Timberland'},
              { name : 'Tommy Hilfiger'},
              { name : 'Tous'},
              { name : 'Trucco'},
              { name : 'Under Armour'},
              { name : 'Vans'},


              { name : 'Versace'},
              { name : 'Vogue'},
              { name : 'Volcom'},
              { name : 'Wesc'},
              { name : 'Women Secret'}  
      ]
    }
  }
}
</script>
