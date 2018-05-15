<template>
  <div>
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Lista de Empleados </h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
          <a class="dropdown-toggle"
             data-toggle="dropdown"
             href="#">
            <i class="fa fa-wrench"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>
              <a href="#">Config option 1</a>
            </li>
            <li>
              <a href="#">Config option 2</a>
            </li>
          </ul>
          <a class="close-link">
            <i class="fa fa-times"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content zui-wrapper">
        <!-- <form action="/payroll" method="POST"> -->
        <select name="month" v-model="month">
          <option v-for="(m, index) in months" :key="`month-${m.name}`" :value="calculateMonth(m.name)" v-text="m.name"></option>
        </select>
        <select name="year" v-model="year">
          <option value="2017">2017</option>
          <option value="2018" selected>2018</option>
        </select>
          <div class="table-responsive zui-scroller">
            <table class="table table-striped zui-table">
              <thead>
                <tr>
                  <th class="zui-sticky-col">Ci</th>
                  <th class="zui-sticky-col-1">Trabajador</th>
                  <th>Cuenta Bancaria</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Cargo</th>
                  <th>Puesto</th>
                  <th># de dias Trabajados</th>
                  <th>Haber basico</th>
                  <th>Total Ganado</th>
                  <th>AFP</th>
                  <th v-for="(discount, index) in discountsLaw" v-text="discount.name" :key="`discount-law-${index}`"></th>
                  <th>Total descuentos de ley</th>
                  <th>Sueldo Neto</th>
                  <th>RC-IVA 13%</th>
                  <th v-for="(discount1, index) in discountsInstitution" v-text="discount1.name" :key="`discount-institution-${index}`"></th>
                  <th>Total descuentos</th>
                  <th>Liquido Pagable</th>
                </tr>
              </thead>
              <tbody>
                <row v-for="(value, index) in employees"
                    :key="`employee-${index}`"
                    :employee="value"
                    :month="month"
                    :year="year"
                    ></row>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="text-center">
              <br>
              <!-- <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Guardar</button> -->
              <!-- <button class="btn btn-primary" type="button" @click="save()"> <i class="fa fa-save"></i> Guardar</button> -->
            </div>
          </div>
        <!-- </form> -->
       </div>
      </div>
    </div>

  </div>
</template>

<script>
import row from "./row.vue";

export default {
    components: {
        row
    },
    data() {
        return {
            year:2018,
            month:moment().month()+1,
            months:[],
            employees: [],
            discountsLaw: [],
            discountsInstitution: []
        };
    },
    methods:{
      save(){
        axios.post('/payroll',{
        }).then(response => {
          console.log(response.data);
        }).catch(error=>{
          console.log(error);
        });
      },
      calculateMonth(month){
        switch (month) {
          case 'Enero':
            return 1;
            break;
          case 'Febrero':
            return 2;
            break;
          case 'Marzo':
            return 3;
            break;
          case 'Abril':
            return 4;
            break;
          case 'Mayo':
            return 5;
            break;
          case 'Junio':
            return 6;
            break;
          case 'Julio':
            return 7;
            break;
          default:
            break;
        }
      },
    },
    created() {
      axios.get("/api/months")
      .then(response=>{
        this.months = response.data;
      }).catch(error=>{
        console.log(error);
      });
        axios
            .get("/api/discounts")
            .then(response => {
                this.discountsLaw = response.data.filter(item => {
                    return item.discount_type_id == 1;
                });
                this.discountsInstitution = response.data.filter(item => {
                    return item.discount_type_id == 2;
                });
            })
            .catch(error => {
                console.log(error);
            });
        axios
            .get("/api/employees")
            .then(response => {
                this.employees = response.data.employees;
            })
            .catch(error => {
                console.log(error);
            });
    }
};
</script>
<style scoped>
.zui-table {
    border: none;
    border-right: solid 1px #ddefef;
    border-collapse: separate;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
}
.zui-table thead th {
    background-color: #ddefef;
    border: none;
    color: #336b6b;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
    white-space: nowrap;
}
.zui-table tbody td {
    border-bottom: solid 1px #ddefef;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
    white-space: nowrap;
}
.zui-wrapper {
    position: relative;
}
.zui-scroller {
    margin-left: 460px;
    overflow-x: scroll;
    overflow-y: visible;
    padding-bottom: 5px;
}
.zui-table .zui-sticky-col {
    left: 0;
    position: absolute;
    top: auto;
    width: 160px;
}
.zui-table .zui-sticky-col-1 {
    left: 160px;
    position: absolute;
    top: auto;
    width: 320px;
}
</style>
