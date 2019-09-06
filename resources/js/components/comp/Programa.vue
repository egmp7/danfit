<template>
  <div id="programa">
    <h2>Programa de entrenamiento personalizado</h2>
    <div class="wrap">
      <!-- TABLE -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Día</th>
            <th scope="col">Entrenamiento</th>
            <th class="train" scope="col">Comenzar!</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="userProgram in user.program" v-bind:key="userProgram.id">
            <td scope="row">{{userProgram.day}}</td>
            <td>{{userProgram.workout.name}}</td>
            <td>
              <router-link to="/workout" v-if="userProgram.active">
                <i class="fas fa-arrow-right" @click="$emit('setWork-Data',userProgram.workout)"></i>
              </router-link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      workOutInfo: {}
    };
  },
  props: ["user", "workouts"],
  created() {},
  methods: {}
};
</script>
<style scoped>
table {
  margin: 0;
  color: #2f2f5f;
}
a {
  color: #2f2f5f;
}
.wrap {
  border-radius: 15px;
  border: solid #cbdff3 1px;
  margin: 20px 0 0px;
  background: #e4f2ff;
}
.table th {
  border: none;
}
.train {
  text-align: center;
}
i {
  display: block;
  text-align: center;
}
</style>