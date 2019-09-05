<template>
  <router-view
    v-bind:user="user"
    v-bind:workouts="workouts"
    v-bind:workoutsInfo="workoutsInfo"
    v-on:setWork-Data="setWorkOutData"
    v-on:change-month="setMonth"
    v-on:save-workout="saveWorkout"
  ></router-view>
</template>

<script>
import Navbar from "./inc/Navbar";
import Calendario from "./comp/Calendario";
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
    Calendario,
    Workout
  },
  data() {
    return {
      user: {},
      workouts: {
        workOutData: "1,2,3,4,5,6,7,8,9" //TESTING PURPOSES
      },
      workoutsInfo: {}
    };
  },
  created() {
    this.fetchUserData();
    this.fetchWorkoutsData();
    this.fetchWorkoutsInfo();
  },
  methods: {
    // ********************************************************************
    //    GET DATA
    // ********************************************************************

    userId() {
      var id = window.location.pathname.slice(11);
      return id;
    },
    fetchUserData() {
      fetch("../api/user_data/" + this.userId())
        .then(res => res.json())
        .then(res => {
          this.user = {
            main: res.data,
            nWorkout: this.getNWorkout(res.data),
            progressBar: this.getProgressBar(
              res.data.progress,
              this.getNWorkout(res.data)
            ),
            calendar: this.setMonth(this.getNWorkout(res.data).month, res.data)
          };
        });
    },
    fetchWorkoutsData() {
      fetch("../api/workouts/")
        .then(res => res.json())
        .then(res => {
          this.workouts = {
            all: res.data,
            next: this.getWorkOutInfo(res.data, this.user.nWorkout),
            workOutData: ""
          };
        });
    },
    fetchWorkoutsInfo() {
      fetch("../api/workouts_info/")
        .then(res => res.json())
        .then(res => {
          this.workoutsInfo = res.data;
        });
    },
    // ********************************************************************
    //    USER OBJECT
    // ********************************************************************
    getNWorkout(userData) {
      if (userData.progress.length > 0) {
        //  LATEST RECORD OF USER PROGRESS
        let lProgress = userData.progress[userData.progress.length - 1];
        //LOGIC FOR nWorkout DAYS AND MONTHS
        if (lProgress.day < 28) {
          return {
            type: userData.type,
            month: lProgress.month,
            day: lProgress.day + 1
          };
        } else {
          return {
            type: userData.type,
            month: lProgress.month + 1,
            day: 1
          };
        }
      } else {
        return {
          type: userData.type,
          month: 1,
          day: 1
        };
      }
    },
    getProgressBar(progress, nWorkout) {
      let counter = 0;
      progress.map(x => {
        if (x.month == nWorkout.month && x.type == nWorkout.type) {
          counter++;
        }
      });
      return (counter / 28) * 100;
    },
    getProgressDays(user, monthAndType) {
      let daysCompleted = [];
      let days = [];
      user.map(x => {
        if (x.month == monthAndType.month && x.type == monthAndType.type) {
          daysCompleted.push(x.day);
        }
      });
      for (let i = 1; i < 29; i++) {
        let data = {};
        if (daysCompleted.includes(i)) {
          data.day = i;
          data.completed = true;
          days.push(data);
        } else {
          data.day = i;
          data.completed = false;
          days.push(data);
        }
      }
      return days;
    },
    setMonth(month, user) {
      let monthAndType = {
        month: month,
        type: user.type
      };
      let data = {
        month: month,
        days: this.getProgressDays(user.progress, monthAndType)
      };
      this.user.calendar = data;
      return data;
    },
    // ********************************************************************
    //    WORKOUTS OBJECT
    // ********************************************************************

    getWorkOutInfo(workouts, nWorkout) {
      let data = null;
      workouts.map(x => {
        if (
          x.type == nWorkout.type &&
          x.month == nWorkout.month &&
          x.day == nWorkout.day
        ) {
          data = x;
        }
      });
      return data;
    },
    setWorkOutData(data) {
      this.workouts.workOutData = data;
      this.user.nWorkout = {
        type: data.type,
        month: data.month,
        day: data.day
      };
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