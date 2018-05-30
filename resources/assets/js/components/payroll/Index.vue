<template>
  <div>
    <div class="ibox " >
      <div class="ibox-title">
        <h5>Lista de Empleados </h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content" >
        <div class="table-responsive"  style="min-height:450px;max-height:500px;">
          <table class="table table-striped table-bordered table-hover zui-table">
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
                   v-if="!edit"></row>
              <edit-row v-for="(value, index) in payrolls"
                        :key="`payroll-${index}`"
                        :payroll="value"
                        :procedure="procedure"
                        v-if="edit"></edit-row>
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
</template>

<script>
  import row from "./row.vue";
  import EditRow from "./EditRow.vue";

  export default {
    props: ["edit", "procedure"],
    components: {
      row,
      EditRow
    },
    data() {
      return {
        contracts: [],
        payrolls: []
      };
    },
    created() {
      if (this.edit) {
        axios
          .get("/api/payrolls", {
            params: {
              year: 2018,
              month: "abril"
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
      } else {
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
  /* .zui-table tbody td {
    border-bottom: solid 1px #ddefef;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
    white-space: nowrap;
  }
  .zui-wrapper {
    position: relative;
    margin-bottom: 50px;
  }
  .zui-scroller {
    height: 400px;
    margin-left: 460px;
    overflow-x: scroll;
    overflow-y: auto;
    padding-bottom: 5px;
  } */
  /* .zui-table .zui-sticky-col {
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
  } */
  .zui-table table {
  overflow: hidden;
}

.zui-table td,.zui-table th {
  padding: 10px;
  position: relative;
  outline: 0;
}

body:not(.nohover) .zui-table tbody tr:hover {
  background-color: #ffa;
}

  .zui-table td:hover::after,
  .zui-table thead th:not(:empty):hover::after,
  .zui-table td:focus::after,
  .zui-table thead th:not(:empty):focus::after {
    content: '';
    height: 10000px;
    left: 0;
    position: absolute;
    top: -5000px;
    width: 100%;
    z-index: -1;
  }

  .zui-table td:hover::after,
  .zui-table th:hover::after {
    background-color: #ffa;
  }

  .zui-table td:focus::after,
  .zui-table th:focus::after {
    background-color: lightblue;
  }

  .zui-table td:focus::before,
  .zui-table tbody th:focus::before {
    background-color: lightblue;
    content: '';  
    height: 100%;
    top: 0;
    left: -5000px;
    position: absolute;  
    width: 10000px;
    z-index: -1;
  }

</style>
