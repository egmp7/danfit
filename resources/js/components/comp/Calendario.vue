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
      >MES {{nWorkout.month}}</a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#perro">Mes 1</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Mes 2</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Mes 3</a>
      </div>
    </div>

    <div class="box">
      <div class="day" v-bind:class="{'is-completed':day.completed}" v-bind:key="day.day" v-for="day in days" >
        <p >{{day.day}}</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      days: {}
    };
  },
  name: "Calendario",
  props: ["user", "nWorkout"],
  created() {
    this.getProgressDays(this.user.progress, this.nWorkout);
  },
  methods: {
    getProgressDays(user, nWorkout) {
      let daysCompleted = [];
      let days = [];
      user.map(x => {
        if (x.month == nWorkout.month && x.type == nWorkout.type) {
          daysCompleted.push(x.day);
        }
      });
      for (let i = 1; i < 29; i++) {
        daysCompleted.map(x => {
          if (x == i) {
            let data = {
              day: i,
              completed: true
            };
            days.push(data);
          } else {
            let data = {
              day: i,
              completed: false
            };
            days.push(data);
          }
        });
      }
      days = [...new Set(days)];
      this.days = days;
    }
  }
};
</script>
<style scoped>
.is-completed{
  background:#96e07e !important;
}
</style>