<template>
    <tr>
        <td class="zui-sticky-col">{{ contract.identity_card}} {{ contract.city_identity_card }}</td>
        <td class="zui-sticky-col-1">{{ fullName(contract) }}</td>
        <td>{{ contract.account_number}}</td>
        <td>{{ contract.birth_date}}</td>
        <td>{{ contract.charge}}</td>
        <td>{{ contract.position }}</td>
        <td><input type="number" v-model="days" :name="`contract-${contract.id}[]`" class="form-control" placeholder="dias trabajados" min="1" max="30"></td>
        <td>{{ baseWage | currency }}</td>
        <td>{{ quotable | currency }}</td>
        <td>{{ contract.management_entity}}</td>
        <td v-for="(discount, index) in discountsLaw" :key="`d-l-${index}`">{{ calculateDiscount(discount) | currency }}</td>
        <td>{{ calculateTotalDiscount(discountsLaw) | currency }}</td>
        <td>{{ salary | currency}}</td>
        <td>0</td>
        <td v-for="(discount, index) in discountsInstitution" :key="`d-i-${index}`">
            <input type="text" class="form-control" :name="`contract-${contract.id}[]`" v-model="di">
        </td>
        <td> {{ totalDiscounts | currency }} </t>
        <td> {{ total | currency}} </td>
    </tr>
</template>

<script>
export default {
  props:['contract', 'year', 'month', 'discountsLaw', 'discountsInstitution'],
  data(){
    return{
        days: 30,
        baseWage: this.contract.base_wage,
        // discountsLaw: [],
        // discountsInstitution: [],
        di:null,
        delay: 0,
    }
  },
  created(){
      console.log(this.contract);
      
    // axios.get('/api/discounts').then(response => {
    //       this.discountsLaw = response.data.filter(item => {
    //           return item.discount_type_id == 1;
    //       });
    //       this.discountsInstitution = response.data.filter(item => {
    //           return item.discount_type_id == 2 ;
    //       });
    // }).catch(error=>{
    //       console.log(error);
    // });
  },
  methods:{
      fullName(contract){
          let name = `${contract.first_name || ''} ${contract.second_name || ''} ${contract.last_name || ''} ${contract.mothers_last_name || ''} ${contract.surname_husband || ''}`
          name = name.replace(/\s+/gi, ' ').trim().toUpperCase();
          return name;
      },
    //   maxDay(){
    //       return moment(`${this.year}-${this.month}-01`).daysInMonth();
    //   },
      calculateDiscount(discount){
          return (this.quotable * discount.percentage)/100;
      },
      calculateTotalDiscount(discounts){
          return discounts.reduce((prev, curr)=>{
              return prev+this.calculateDiscount(curr);
          }, 0)
      },
      calculateTotalDiscountInstitution(){
          return this.discountsInstitution.reduce((prev, curr)=>{
              return prev + this.di;
          }, 0);
      },

  },
  computed:{
      total(){
          return this.quotable - this.totalDiscounts;
      },
      totalDiscounts(){
          return parseFloat(this.calculateTotalDiscount(this.discountsLaw)) + parseFloat(this.calculateTotalDiscountInstitution());
      },
      quotable()  {
          return (this.baseWage/30)*this.days;
      },
      salary(){
          return this.quotable - this.calculateTotalDiscount(this.discountsLaw);
      }
  },
}
</script>
<style scoped>
.zui-table .zui-sticky-col {
    left: 0;
    position: absolute;
    top: auto;
    height:51px;
    width: 160px;
    text-align: right;
}
.zui-table .zui-sticky-col-1 {
    left: 160px;
    position: absolute;
    top: auto;
    height:51px;
    width: 320px;
    text-align:left;
}
</style>