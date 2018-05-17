<template>
    <tr>
        <td class="zui-sticky-col">{{ payroll.identity_card}} {{ payroll.city_identity_card }}</td>
        <td class="zui-sticky-col-1">{{ fullName(payroll) }}</td>
        <td>{{ payroll.account_number}}</td>
        <td>{{ payroll.birth_date}}</td>
        <td>{{ payroll.charge}}</td>
        <td>{{ payroll.position }}</td>
        <td><input type="number" v-model="days" :name="`payroll-${payroll.id}[]`" class="form-control" placeholder="dias trabajados" min="1" max="30"></td>
        <td>{{ baseWage | currency }}</td>
        <td>{{ quotable | currency }}</td>
        <td>{{ payroll.management_entity}}</td>
        <td v-for="(discount, index) in discountsLaw" :key="`d-l-${index}`">{{ calculateDiscount(discount) | currency }}</td>
        <td>{{ calculateTotalDiscount(discountsLaw) | currency }}</td>
        <td>{{ salary | currency}}</td>
        <td>0</td>
        <td v-for="(discount, index) in discountsInstitution" :key="`d-i-${index}`">
            <input type="text" class="form-control" :name="`payroll-${payroll.id}[]`" v-model="di">
        </td>
        <td> {{ totalDiscounts | currency }} </t>
        <td> {{ total | currency}} </td>
    </tr>
</template>

<script>
export default {
  props:['payroll', 'year', 'month', 'discountsLaw', 'discountsInstitution'],
  data(){
    return{
        days: this.payroll.worked_days,
        di: null,
        baseWage: this.payroll.base_wage,
        // discountsLaw: [],
        // discountsInstitution: [],
        delay: 0,
    }
  },
  created(){
      console.log(this.payroll);
      
  },
  methods:{
      fullName(payroll){
          let name = `${payroll.first_name || ''} ${payroll.second_name || ''} ${payroll.last_name || ''} ${payroll.mothers_last_name || ''} ${payroll.surname_husband || ''}`
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