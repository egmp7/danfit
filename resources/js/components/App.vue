<template>
  <router-view
    v-bind:user="user"
    v-bind:workouts="workouts"
    v-bind:nWorkout="nWorkout"
    v-bind:workOutData="workOutData"
    v-on:setWork-Data="setWorkOutData"
  ></router-view>
</template>

<script>
import Navbar from "./inc/Navbar";
import Calendario from "./comp/Calendario";
import Configuracion from "./comp/Configuracion";
import Tipo from "./comp/Tipo";
import User from "./comp/User";
import Workout from "./comp/Workout";

export default {
  name: "app",
  components: {
    Navbar,
    User,
    Configuracion,
    Calendario,
    Workout
  },
  data() {
    return {
      user: [],
      workouts: [],
      nWorkout: {
        type: "1", //THIS NEEDS WORK _____________PILAS
        month: "1",
        day: "1"
      },
      workOutData: [],
    };
  },
  created() {
    this.fetchUser();
    this.fetchWorkouts();
  },
  methods: {
    fetchUser() {
      fetch("../api/user_data/" + this.userId())
        .then(res => res.json())
        .then(res => {
          this.user = res.data;
          this.getNWorkout();
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
    },
    getNWorkout() {
      this.nWorkout.type = 1; //THIS NEEDS TO BE UPDATED
      if (this.user.progress.length > 0) {
        let lProgress = this.user.progress[this.user.progress.length - 1];
        //LOGIC FOR nWorkout DAYS AND MONTHS
        if (lProgress.day < 28) {
          this.nWorkout.day = lProgress.day + 1;
          this.nWorkout.month = lProgress.month;
        } else {
          this.nWorkout.day = 1;
          this.nWorkout.month = lProgress.month + 1;
        }
      }
    },
    setWorkOutData(data) {
      this.workOutData = data;
    }
  }
};
</script>