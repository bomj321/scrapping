<!-- Vue component -->
<template>
 <div>
  <label class="typo__label">Talla</label>
  <multiselect v-model="value" :options="options" :multiple="true" group-values="tallas" group-label="tiposTallas" :group-select="false" placeholder="Escoja Un Filtro" track-by="name" label="name" @select='ValueSelected' @remove='ValueRemoved'>
      <span slot="noResult">No hay elementos lo siento</span>
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
               {
          tiposTallas: 'Camisas, blusas, tops...',
          tallas: [

              { name: 'XXS', tallaSection: 'TallaXXS'},              
              { name: 'XS', tallaSection: 'TallaXS'},
              { name: 'S', tallaSection: 'TallaS'},
              { name: 'M', tallaSection: 'TallaM'},
              { name: 'L', tallaSection: 'TallaL'},
              { name: 'XL', tallaSection: 'TallaXL'},
              { name: 'XXL', tallaSection: 'TallaXXL'}           
          ]
        },
        {
          tiposTallas: 'Deportivas y zapatos',
          tallas: [
                { name : '<34', tallaSection: 'Talla<34'},
                { name : '34', tallaSection: 'Talla34'},
                { name : '35', tallaSection: 'Talla35'},
                { name : '36', tallaSection: 'Talla36'},
                { name : '37', tallaSection: 'Talla37'},
                { name : '38', tallaSection: 'Talla38'},
                { name : '39', tallaSection: 'Talla39'},
                { name : '40', tallaSection: 'Talla40'},
                { name : '41', tallaSection: 'Talla41'},
                { name : '42', tallaSection: 'Talla42'},
                { name : '43', tallaSection: 'Talla43'},
                { name : '44', tallaSection: 'Talla44'},
                { name : '45', tallaSection: 'Talla45'},
                { name : '46', tallaSection: 'Talla46'},
                { name : '47', tallaSection: 'Talla47'},
                { name : '48', tallaSection: 'Talla48'},
                { name : '48>', tallaSection: 'Talla48>'}
          ]
        },
        {
          tiposTallas: 'Pantalones, faldas, shorts...',
          tallas: [
                  { name : '23W', tallaSection: 'Talla23W'},
                  { name : '24W', tallaSection: 'Talla24W'},
                  { name : '25W', tallaSection: 'Talla25W'},
                  { name : '26W', tallaSection: 'Talla26W'},
                  { name : '27W', tallaSection: 'Talla27W'},
                  { name : '28W', tallaSection: 'Talla28W'},
                  { name : '29W', tallaSection: 'Talla29W'},
                  { name : '30W', tallaSection: 'Talla30W'},
                  { name : '31W', tallaSection: 'Talla31W'},
                  { name : '32W', tallaSection: 'Talla32W'},
                  { name : '33W', tallaSection: 'Talla33W'},
                  { name : '34W', tallaSection: 'Talla34W'},
                  { name : '35W', tallaSection: 'Talla35W'},
                  { name : '36W', tallaSection: 'Talla36W'},
                  { name : '37W', tallaSection: 'Talla37W'},
                  { name : '38W', tallaSection: 'Talla38W'},
                  { name : '39W', tallaSection: 'Talla39W'},

                  { name : '40W', tallaSection: 'Talla40W'},
                  { name : '41W', tallaSection: 'Talla41W'},
                  { name : '42W', tallaSection: 'Talla42W'},
                  { name : '43W', tallaSection: 'Talla43W'},
                  { name : '44W', tallaSection: 'Talla44W'},
                  { name : '45W', tallaSection: 'Talla45W'},
                  { name : '46W', tallaSection: 'Talla46W'},
                  { name : '47W', tallaSection: 'Talla47W'},
                  { name : '48W', tallaSection: 'Talla48W'}
          ]
        },

        {
          tiposTallas: 'Vestidos',
          tallas: [
                  { name : '32', tallaSection: 'Talla32'},
                  { name : '34', tallaSection: 'Talla34'},
                  { name : '36', tallaSection: 'Talla36'},
                  { name : '38', tallaSection: 'Talla38'},
                  { name : '40', tallaSection: 'Talla40'},
                  { name : '42', tallaSection: 'Talla42'},
                  { name : '44', tallaSection: 'Talla44'}
          ]
        },

        {
          tiposTallas: 'Bañadores',
          tallas: [
                    {name : 'XXS', tallaSection: 'TallaXXS'},
                    {name : 'XS', tallaSection: 'TallaXS'},
                    {name : 'S', tallaSection: 'TallaS'},
                    {name : 'M', tallaSection: 'TallaM'},
                    {name : 'L', tallaSection: 'TallaL'},
                    {name : 'XL', tallaSection: 'TallaXL'},
                    {name : 'XXL', tallaSection: 'TallaXXL'}
          ]
        }
      ]
    }
  },
  methods: {
      ValueSelected(option) {

                         this.valueSelects.push(option.tallaSection);
                         EventBus.$emit('filter',this.valueSelects);     


      },

      ValueRemoved(removedOption){

                for( var i = 0; i < this.valueSelects.length; i++){ 
                 if (this.valueSelects[i] === removedOption.tallaSection) {
                       this.valueSelects.splice(i, 1); 
                 }
               }

              console.log(removedOption.tallaSection);
              EventBus.$emit('filterOut',removedOption.tallaSection);
       
      }
  }
}
</script>
