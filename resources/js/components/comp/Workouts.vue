<template>
  <div id="workouts">
    <!-- TITTLE -->
    <h2>Índice de Entrenamientos</h2>
    <!-- BUTTON DE SELECCION -->
    <div class="dropdown">
      <button
        class="btn btn-primary dropdown-toggle"
        type="button"
        id="dropdownMenuButton"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >Selecciona el Entrenamiento</button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <ul>
          <li
            v-for="workout in workouts.all"
            v-bind:key="workout.id"
            v-bind:id="workout.id"
            @click="getInfo(workout)"
          >{{workout.name}}</li>
        </ul>
      </div>
    </div>
    <!-- WORKOUT INFORMATION -->
    <div id="info">
      <h3>{{info.name}}</h3>
      <p>{{info.description}}</p>
      <router-link to="/workout">
        <button class="btn btn-success btn-block" @click="$emit('setWork-Data',info)">Comenzar!</button>
      </router-link>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      info: {}
    };
  },
  props: ["workouts"],
  methods: {
    getInfo(workout) {
      this.info = workout;
      document.getElementById("info").style.display = "block";
    }
  }
};
</script>
<style scoped>
ul {
  padding: 0 24px;
}
li {
  list-style: none;
  margin: 5px 0;
}
.dropdown button {
  display: block;
  margin: 0 auto;
}
#info {
  padding: 30px 20px;
  margin: 20px 0;
  background: #ddedfb;
  border-radius: 15px;
  display: none;
}
#info h3 {
  text-align: center;
}
</style>