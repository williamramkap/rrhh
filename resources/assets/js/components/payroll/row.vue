<template>
    <tr>
        <td class="zui-sticky-col">{{ employee.identity_card}} {{ employee.city_identity_card }}</td>
        <td class="zui-sticky-col-1">{{ fullName(employee) }}</td>
        <td>{{ employee.account_number}}</td>
        <td>{{ employee.birth_date}}</td>
        <td>{{ employee.charge.length ? employee.charge[0].name : ''}}</td>
        <td>{{ employee.position }}</td>
        <td><input type="number" v-model="days" :name="`employee-${employee.id}[]`" class="form-control" placeholder="dias trabajados" min="1" :max="maxDay()"></td>
        <td>{{ baseWage | currency }}</td>
        <td>{{ quotable | currency }}</td>
        <td>{{ employee.management_entity}}</td>
        <td v-for="(discount, index) in discountsLaw" :key="`d-l-${index}`">{{ calculateDiscount(discount) | currency }}</td>
        <td>{{ calculateTotalDiscount(discountsLaw) | currency }}</td>
        <td>{{ salary | currency}}</td>
        <td>0</td>
        <td v-for="(discount, index) in discountsInstitution" :key="`d-i-${index}`">
            <input type="text" class="form-control" :name="`employee-${employee.id}[]`" v-model="discount.percentage">
        </td>
        <td> {{ totalDiscounts | currency }} </t>
        <td> {{ total | currency}} </td>
    </tr>
</template>

<script>
export default {
  props:['employee', 'year', 'month'],
  data(){
    return{
        days: moment(`${this.year}-${this.month}-01`).daysInMonth(),
        baseWage: this.employee.charge.length ? this.employee.charge[0].base_wage : 0,
        discountsLaw: [],
        discountsInstitution: [],
        delay: 0,
    }
  },
  created(){
    axios.get('/api/discounts').then(response => {
          this.discountsLaw = response.data.filter(item => {
              return item.discount_type_id == 1;
          });
          this.discountsInstitution = response.data.filter(item => {
              return item.discount_type_id == 2 ;
          });
    }).catch(error=>{
          console.log(error);
    });
  },
  methods:{
      fullName(employee){
          let name = `${employee.first_name || ''} ${employee.second_name || ''} ${employee.last_name || ''} ${employee.mothers_last_name || ''} ${employee.surname_husband || ''}`
          name = name.replace(/\s+/gi, ' ').trim().toUpperCase();
          return name;
      },
      maxDay(){
          console.log(this.month);
          return moment(`${this.year}-${this.month}-01`).daysInMonth();
      },
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
              return prev + curr.percentage;
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
          return (this.baseWage/this.maxDay())*this.days;
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