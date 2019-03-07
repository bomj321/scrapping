<!-- Vue component -->
<template>
  <div>
       <label class="typo__label">Precio</label>
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
         { name:'Menos de 25€'},
         { name: 'De 25€ hasta 50€'},
         { name: 'De 50€ hasta 100€'},
         { name: 'Más de 100€'},      
      ]
    }
  }
}
</script>
