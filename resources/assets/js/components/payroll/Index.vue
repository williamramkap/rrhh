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
      <div class="ibox-content">

        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Data</th>
              <th>User</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <row v-for="(value, index) in employees"
                :key="index"
                :employee="value"
            ></row>
          </tbody>
        </table>
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
        employees: []
      };
    },
    created() {
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
