<template>
  <router-view
    v-bind:user="user"
    v-bind:workouts="workouts"
    v-bind:nWorkout="nWorkout"
    v-bind:workOutData="workOutData"
    v-bind:progressBarData="progressBarData"
    v-bind:workOutInfo="workOutInfo"
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
      workOutData: "3,4,5,6,7,8,9,10,11",
      progressBarData:[],
      workOutInfo:[]
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
          //REST OF THE FUNCTIONS TO GET DATA
          this.getProgressBar(this.user.progress, this.getNWorkout());
        });   
    },
    fetchWorkouts() {
      fetch("../api/workouts/")
        .then(res => res.json())
        .then(res => {
          this.workouts = res.data;
          this.getWorkOutInfo(this.workouts);
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
      return this.nWorkout;
    },
    setWorkOutData(data) {
      this.workOutData = data;
    },
    getWorkOutInfo(workouts) {
      workouts.map(x => {
        if (
          x.type == this.nWorkout.type &&
          x.month == this.nWorkout.month &&
          x.day == this.nWorkout.day
        ) {
          this.workOutInfo = x;
        }
      });
    },
    getProgressBar(progress, nWorkout) {
      let counter = 0;
      progress.map(x => {
        if (x.month == nWorkout.month && x.type == nWorkout.type) {
          counter++;
        }
      });
      this.progressBarData = (counter / 28) * 100;
    }
  }
};
</script>