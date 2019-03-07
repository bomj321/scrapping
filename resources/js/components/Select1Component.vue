<!-- Vue component -->
<template>
  <div>
       <label class="typo__label">Tipo de Prenda</label>
      <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Escoja Alguno" label="name" track-by="name" :preselect-first="false">

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
        { name: 'Hombre'},
        { name: 'Mujer'},       
      ]
    }
  }
}
</script>

