<!-- Vue component -->
<template>
  <div>
       <label class="typo__label">Precio</label>
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
      valueSelects:[],
      options: [
         { name: 'Menos de 25€',price: 'Menosde25'},
         { name: 'De 25€ hasta 50€',price: 'De25hasta50' },
         { name: 'De 50€ hasta 100€',price: 'De50hasta100'},
         { name: 'Más de 100€',price: 'Masde100'},      
      ]
    }
  },
  methods: {
      ValueSelected(option) {

                         this.valueSelects.push(option.price);
                         EventBus.$emit('filter',this.valueSelects);    


      },

      ValueRemoved(removedOption){

                for( var i = 0; i < this.valueSelects.length; i++){ 
                 if (this.valueSelects[i] === removedOption.price) {
                       this.valueSelects.splice(i, 1); 
                 }
               }

              console.log(removedOption.price);
              EventBus.$emit('filterOut',removedOption.price);
       
      }
  }
}
</script>
