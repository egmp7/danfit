<template>
  <div>
    <navbar v-bind:user="user"></navbar>
    <router-view
      v-bind:user="user"
      v-bind:workouts="workouts"
      v-on:setWork-Data="setWorkOutData"
      v-on:save-workout="saveWorkout"
    ></router-view>
  </div>
</template>

<script>
import Navbar from "./inc/Navbar";
import Workouts from "./comp/Workouts";
import Configuracion from "./comp/Configuracion";
import Programa from "./comp/Programa";
import User from "./comp/User";
import Workout from "./comp/Workout";

export default {
  name: "app",
  components: {
    Navbar,
    User,
    Configuracion,
    Workouts,
    Workout
  },
  data() {
    return {
      user: {},
      workouts: {}
    };
  },
  created() {
    this.fetchUserData();
  },
  methods: {
    // ********************************************************************
    //    GET DATA
    // ********************************************************************
    fetchUserData() {
      fetch("../api/user_data/" + this.userId())
        .then(res => res.json())
        .then(res => {
          this.user = {
            api: res.data,
            program: "",
            today: ""
          };
          this.fetchWorkoutsData();
        });
    },
    userId() {
      var id = window.location.pathname.slice(11);
      return id;
    },
    fetchWorkoutsData() {
      fetch("../api/workouts/")
        .then(res => res.json())
        .then(res => {
          this.workouts = {
            all: res.data,
            workOutData: "",
            workoutsInfo: ""
          };
          this.fetchWorkoutsInfoData();
        });
    },
    fetchWorkoutsInfoData() {
      let data = "";
      fetch("../api/workouts_info/")
        .then(res => res.json())
        .then(res => {
          data = res.data;
          this.workouts.workoutsInfo = res.data;
        });
      this.getUserProgram(this.user.api.workouts.split(","), this.workouts.all);
    },
    getUserProgram(userProgram, allWorkouts) {
      let program = [];
      let data = "";
      let day = "";
      let counter = 0;
      userProgram.map(x => {
        //  PICK DAY
        switch (counter) {
          case 0:
            day = "Lunes";
            break;
          case 1:
            day = "Martes";
            break;
          case 2:
            day = "Miércoles";
            break;
          case 3:
            day = "Jueves";
            break;
          case 4:
            day = "Viernes";
            break;
          case 5:
            day = "Sábado";
            break;
          case 6:
            day = "Domingo";
            break;
        }
        counter++;
        if (isNaN(parseInt(x))) {
          data = {
            day: day,
            workout: {
              name: "Descanso",
              description:
                "Relaja los músculos, come suficiente proteína para regeneral pronto los músculos"
            },
            active: false
          };
          program.push(data);
        } else {
          allWorkouts.map(y => {
            if (y.id == x) {
              data = {
                day: day,
                workout: y,
                active: true
              };
              program.push(data);
            }
          });
        }
      });
      this.user.program = program;
      this.getTodayProgram();
    },
    getTodayProgram() {

      var d = new Date();
      var weekday = new Array(7);
      weekday[0] = "Domingo";
      weekday[1] = "Lunes";
      weekday[2] = "Martes";
      weekday[3] = "Miércoles";
      weekday[4] = "Jueves";
      weekday[5] = "Viernes";
      weekday[6] = "Sabado";

      var day = weekday[d.getDay()];
      this.user.program.map(x =>{
        if(x.day == day){
          this.user.today = x;
          this.workouts.workOutData =x.workout;
        }
      })
    },
    // ********************************************************************
    //    USER OBJECT
    // ********************************************************************

    // ********************************************************************
    //    WORKOUTS OBJECT
    // ********************************************************************

    setWorkOutData(data) {
      this.workouts.workOutData = data;
    },
    // ********************************************************************
    //    SAVE DATA
    // ********************************************************************
    saveWorkout(data) {
      if (data.day !== undefined) {
        fetch("../api/user_data/" + this.userId(), {
          method: "post",
          body: JSON.stringify(data),
          headers: {
            "content-type": "application/json"
          }
        })
          .then(res => res.json())
          .then(data => {
            (data.type = ""), (data.month = ""), (data.day = "");
            alert("progress saved");
          });
      }
    }
  }
};
</script>