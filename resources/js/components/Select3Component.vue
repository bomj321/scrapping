<!-- Vue component -->
<template>
  <div>
       <label class="typo__label">Precio</label>
      <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Escoja Un Filtro" label="name" track-by="name" :preselect-first="false" @select='ValueSelected' @remove='ValueSelected'>

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
         { name:'Menos de 25€'},
         { name: 'De 25€ hasta 50€'},
         { name: 'De 50€ hasta 100€'},
         { name: 'Más de 100€'},      
      ]
    }
  },
  methods: {
      ValueSelected(option) {

         var valueSelects = [];
/*RETRASO LA FUNCION 500 MILISEGUNDOS PARA QUE APAREZCA EL ELEMENTO SPAN CON LA CLASE MULTISELECT*/        

          setTimeout(function(){

                   $('.multiselect__element span.multiselect__option--selected').map(function()
                 {
                         valueSelects.push($(this).text());
                 }).get();

           }, 300);


/*RETRASO LA FUNCION 500 MILISEGUNDOS PARA QUE APAREZCA EL ELEMENTO SPAN CON LA CLASE MULTISELECT*/          
        

         console.log(valueSelects);


      }
  }
}
</script>
