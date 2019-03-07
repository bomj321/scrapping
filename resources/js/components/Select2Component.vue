<!-- Vue component -->
<template>
  <div>
       <label class="typo__label">Tipo de Prenda</label>
      <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Escoja Un Filtro" label="name" track-by="name" :preselect-first="false">

            <template slot="selection" slot-scope="{ values, search, isOpen }">
              
              <span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} seleccionadas</span>

            </template>
      </multiselect>
  </div>
</template>

<script>

export default {
  
  data () {
    return {
      value: [],
      options: [
        { name: 'Accesorios'},
        { name: 'Abrigos / Chaquetas'},

        { name: 'Americanas / Trajes'}, 
        { name: 'Bolsos'}, 
        { name: 'Bañadores'}, 
        { name: 'Camisas / Camisetas / Polos'}, 
        { name: 'Deportivas / Zapatos'}, 
        { name: 'Faldas'}, 
        { name: 'Gafas de sol / Monturas'},

        { name: 'Pantalones'},
        { name: 'Perfumes'},
        { name: 'Relojes'},
        { name: 'Ropa interior'},
        { name: 'Shorts'},
        { name: 'Sudaderas / Jerséis'},        
      ]
    }
  }
}
</script>
