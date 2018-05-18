<template>
  <div>
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Lista de Empleados </h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">
          <div class="table-responsive" style="max-height:600px;">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Ci</th>
                  <th>Trabajador</th>
                  <th>Cuenta Bancaria</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Cargo</th>
                  <th>Puesto</th>
                  <th># de dias Trabajados</th>
                  <th>Haber basico</th>
                  <th>Total Ganado</th>
                  <th>AFP</th>
                  <th>Descuento Renta vejez 10 %</th>
                  <th>Descuento Riesgo común 1,71 %</th>
                  <th>Descuento Comisión 0 ,5 %</th>
                  <th>Descuento Aporte solidario del asegurado 0 ,5 %</th>
                  <th>Descuento Aporte Nacional solidario 1 %</th>
                  <th>Total descuentos de ley</th>
                  <th>Sueldo Neto</th>
                  <th>RC-IVA 13%</th>
                  <th>Descuentos por Atrasos, Abandonos, Faltas y Licencia S/G Haberes</th>
                  <th>Total descuentos</th>
                  <th>Liquido Pagable</th>
                </tr>
              </thead>
              <tbody>

                <row v-for="(value, index) in contracts"
                    :key="`contract-${index}`"
                    :contract="value"
                    :procedure="procedure"
                    v-if="!edit"
                    ></row>
                <edit-row v-for="(value, index) in payrolls"
                    :key="`payroll-${index}`"
                    :payroll="value"
                    :procedure="procedure"
                    v-if="edit"
                    ></edit-row>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="text-center">
              <br>
            </div>
          </div>
       </div>
      </div>
    </div>

  </div>
</template>

<script>
import row from "./row.vue";
import EditRow from "./EditRow.vue";

export default {
    props:['edit', 'procedure'],
    components: {
        row,
        EditRow
    },
    data() {
        return {
            contracts: [],
            payrolls: [],
        };
    },
    created() {
      console.log(this.procedure);
      
        if (this.edit) {
          axios.get("/api/payrolls",{
            params:{
              year: 2018,
              month: 'abril'
              // year: this.procedure.year,
              // month: this.procedure.month.name
              }
          })
            .then(response => {
              this.payrolls = response.data;
            })
            .catch(error => {
              console.log(error);
            });
        }else{
          axios
            .get("/api/contracts")
            .then(response => {
              this.contracts = response.data.contracts;
            })
            .catch(error => {
              console.log(error);
            });
        }
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
    margin-bottom: 50px
}
.zui-scroller {
    height:400px;
    margin-left: 460px;
    overflow-x: scroll;
    overflow-y: auto;
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
