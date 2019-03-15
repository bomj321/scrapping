<!-- Vue component -->
<template>
  <div>
       <label class="typo__label">Tipo de Prenda</label>
      <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Escoja Un Filtro" label="name" track-by="name" :preselect-first="false" @select='ValueSelected' @remove='ValueRemoved'>

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
      valueSelects: [], 
      options: [
        { name: 'Accesorios', section: 'ACCESSORY'},
        { name: 'Abrigos / Chaquetas', section: 'OUTERWEAR'},

        { name: 'Americanas / Trajes', section: 'BLAZER'}, 
        { name: 'Bolsos', section: 'HANDBAG'}, 
        { name: 'Bañadores', section: 'SWIMWEAR'}, 
        { name: 'Camisas / Camisetas / Polos', section: 'SHIRT'}, 
        { name: 'Zapatos', section: 'SHOE'}, 
        { name: 'Faldas', section: 'SKIRT'}, 
        { name: 'Gafas de sol / Monturas', section: 'EYEWEAR'},

        { name: 'Pantalones', section: 'PANTS'},
        { name: 'Perfumes', section: 'ABIS DRUGSTORE'},
        { name: 'Relojes', section: 'WATCH'},
        { name: 'Ropa interior', section: 'SLEEPWEAR'},
        { name: 'Shorts', section: 'SHORTS'},
        { name: 'Sudaderas / Jerséis', section: 'SWEATER'},
        { name: 'Artículos Deportivos', section: 'SPORTING GOODS'},  
      ]
    }
  },
  methods: {
      ValueSelected(option) {  
                         this.valueSelects.push(option.section);
                         EventBus.$emit('filter',this.valueSelects);

      },

      ValueRemoved(removedOption){

                for( var i = 0; i < this.valueSelects.length; i++){ 
                 if (this.valueSelects[i] === removedOption.section) {
                       this.valueSelects.splice(i, 1); 
                 }
               }

              console.log(removedOption.section);
              EventBus.$emit('filterOut',removedOption.section);


       
      }
  }
}
</script>
