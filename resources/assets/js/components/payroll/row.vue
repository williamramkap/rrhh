<template>
    <tr>
        <td>{{ employee.identity_card}}</td>
        <td>{{ employee.full_name}}</td>
        <td>{{ employee.birth_date}}</td>
        <td>{{ employee.charge.length ? employee.charge[0].name : ''}}</td>
        <td><input type="number" v-model="days" class="form-control" placeholder="dias trabajados" min="1" :max="maxDay()"></td>
        <td><span v-text="baseWage" ></span></td>
        <td><span v-text="quotable"></span></td>
    </tr>
</template>
<script>
export default {
  props:['employee'],
  data(){
      return{
          days: moment().daysInMonth(),
          baseWage: this.employee.charge.length ? this.employee.charge[0].base_wage : 0,
      }
  },
  methods:{
      maxDay(){
          return moment().daysInMonth();
      }
  },
  computed:{
      quotable()  {
          console.log(`${this.baseWage} ${moment().daysInMonth()} ${this.days}`);
          
          return (this.baseWage/this.maxDay())*this.days;
      }
  },
}
</script>
