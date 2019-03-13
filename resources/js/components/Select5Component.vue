<!-- Vue component -->
<template>
 <div>
  <label class="typo__label">Talla</label>
  <multiselect v-model="value" :options="options" :multiple="true" group-values="tallas" group-label="tiposTallas" :group-select="false" placeholder="Escoja Un Filtro" track-by="name" label="name" @select='ValueSelected' @remove='ValueSelected'>
      <span slot="noResult">No hay elementos lo siento</span>
  </multiselect>
</div>
</template>

<script>

export default {

 data () {
    return {
      value: [],
      options: [
               {
          tiposTallas: 'Camisas, blusas, tops...',
          tallas: [

              { name: 'XXS'},              
              { name: 'XS'},
              { name: 'S'},
              { name: 'M'},
              { name: 'L'},
              { name: 'XL'},
              { name: 'XXL'}           
          ]
        },
        {
          tiposTallas: 'Deportivas y zapatos',
          tallas: [
                { name : '<34'},
                { name : '34'},
                { name : '35'},
                { name : '36'},
                { name : '37'},
                { name : '38'},
                { name : '39'},
                { name : '40'},
                { name : '41'},
                { name : '42'},
                { name : '43'},
                { name : '44'},
                { name : '45'},
                { name : '46'},
                { name : '47'},
                { name : '48'},
                { name : '48>'}
          ]
        },
        {
          tiposTallas: 'Pantalones, faldas, shorts...',
          tallas: [
                  { name : '23W'},
                  { name : '24W'},
                  { name : '25W'},
                  { name : '26W'},
                  { name : '27W'},
                  { name : '28W'},
                  { name : '29W'},
                  { name : '30W'},
                  { name : '31W'},
                  { name : '32W'},
                  { name : '33W'},
                  { name : '34W'},
                  { name : '35W'},
                  { name : '36W'},
                  { name : '37W'},
                  { name : '38W'},
                  { name : '39W'},

                  { name : '40W'},
                  { name : '41W'},
                  { name : '42W'},
                  { name : '43W'},
                  { name : '44W'},
                  { name : '45W'},
                  { name : '46W'},
                  { name : '47W'},
                  { name : '48W'}
          ]
        },

        {
          tiposTallas: 'Vestidos',
          tallas: [
                  { name : '32'},
                  { name : '34'},
                  { name : '36'},
                  { name : '38'},
                  { name : '40'},
                  { name : '42'},
                  { name : '44'}
          ]
        },

        {
          tiposTallas: 'Bañadores',
          tallas: [
                    {name : 'XXS'},
                    {name : 'XS'},
                    {name : 'S'},
                    {name : 'M'},
                    {name : 'L'},
                    {name : 'XL'},
                    {name : 'XXL'}
          ]
        }
      ]
    }
  },
  methods: {
      ValueSelected(option) {

        
         var valueSelects = [];
/*RETRASO LA FUNCION 300 MILISEGUNDOS PARA QUE APAREZCA EL ELEMENTO SPAN CON LA CLASE MULTISELECT*/        

          setTimeout(function(){

                   $('.multiselect__element span.multiselect__option--selected').map(function()
                 {
                         valueSelects.push($(this).text());
                 }).get();

                     EventBus.$emit('filter',valueSelects);  

           }, 300);


/*RETRASO LA FUNCION 300 MILISEGUNDOS PARA QUE APAREZCA EL ELEMENTO SPAN CON LA CLASE MULTISELECT*/     


      }
  }
}
</script>
