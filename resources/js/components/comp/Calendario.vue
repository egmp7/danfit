<template>
  <div id="calendario">
    <h2>CALENDARIO</h2>

    <div class="dropdown">
      <a
        class="btn btn-secondary dropdown-toggle"
        href="#"
        role="button"
        id="dropdownMenuLink"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >MES {{month}}</a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a @click="changeMonth(1)" class="dropdown-item" href="#">Mes 1</a>
        <div class="dropdown-divider"></div>
        <a @click="changeMonth(2)" class="dropdown-item" href="#">Mes 2</a>
        <div class="dropdown-divider"></div>
        <a @click="changeMonth(3)" class="dropdown-item" href="#">Mes 3</a>
      </div>
    </div>

    <div class="box">
      <router-link to="/workout">
        <div
          class="day"
          v-bind:class="{'is-completed':day.completed}"
          v-bind:key="day.day"
          v-for="day in days"
          @click="getWorkOutInfo(day.day),$emit('setWork-Data',workOutInfo.workout)"
        >
          <p>{{day.day}}</p>
        </div>
      </router-link>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      days: {},
      month: "",
      workOutInfo: {
        workout: []
      }
    };
  },
  //name: "Calendario",
  props: ["user", "nWorkout", "workouts"],
  created() {
    this.changeMonth(this.nWorkout.month);
  },
  methods: {
    getProgressDays(user, monthAndType) {
      let daysCompleted = [];
      let days = [];
      user.map(x => {
        if (x.month == monthAndType.month && x.type == monthAndType.type) {
          daysCompleted.push(x.day);
        }
      });
      for (let i = 1; i < 29; i++) {
        let data ={};
        if (daysCompleted.includes(i)){
          data.day = i;
          data.completed = true;
          days.push(data);
        }else{
          data.day = i;
          data.completed = false;
          days.push(data);
        }
      }      
      this.days = days;
    },
    changeMonth(month) {
      this.month = month;
      let monthAndType = {
        month: month,
        type: this.nWorkout.type
      };
      this.getProgressDays(this.user.progress, monthAndType);
    },
    getWorkOutInfo(day) {
      let data = {};
      this.workouts.map(x => {
        if (
          x.type == this.nWorkout.type && //THIS NEED MORE WORK______PILAS
          x.month == this.month &&
          x.day == day
        ) {
          data = x;
        }
      });
      this.workOutInfo = data;
    },
    reload() {
      //  CHANGE THIS IN PRODUCTION
      window.location.href = "http://danfit.local/dashboard/1#/workout";
    }
  }
};
</script>
<style scoped>
.box a {
  display: flex;
  flex-wrap: wrap;
}
.is-completed {
  background: #96e07e !important;
}
</style>