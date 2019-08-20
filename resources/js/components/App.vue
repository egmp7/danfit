<template>
  <router-view v-bind:user="user" v-bind:workouts="workouts" v-bind:nWorkout="nWorkout"></router-view>
</template>

<script>
import Calendario from "./comp/Calendario";
import Configuracion from "./comp/Configuracion";
import Tipo from "./comp/Tipo";
import User from "./comp/User";

export default {
  name: "app",
  components: {
    User,
    Configuracion,
    Calendario
  },
  data() {
    return {
      user: {},
      workouts: {},
      nWorkout: {
        type: "perro",
        month: "",
        day: ""
      }
    };
  },
  created() {
    this.fetchUser();
    this.fetchWorkouts();
    this.userId();
  },
  methods: {
    fetchUser() {
      fetch("../api/user_data/" + this.userId())
        .then(res => res.json())
        .then(res => {
          this.user = res.data;
          //GET NEXT WORKOUT: TYPE MONTH AND DAY
          let arrayLenght = res.data.progress.length;
          this.nWorkout.type = res.data.progress[arrayLenght - 1].type;
          this.nWorkout.month = res.data.progress[arrayLenght - 1].month;
          if (res.data.progress[arrayLenght - 1].day + 1 > 28) {
            this.nWorkout.day = 1;
            this.nWorkout.month++;
          } else {
            this.nWorkout.day = res.data.progress[arrayLenght - 1].day + 1;
          }
        });
    },
    fetchWorkouts() {
      fetch("../api/workouts/")
        .then(res => res.json())
        .then(res => {
          this.workouts = res.data;
        });
    },
    userId() {
      var id = window.location.pathname.slice(11);
      return id;
    }
  }
};
</script>