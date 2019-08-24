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
      >MES {{user.calendar.month}}</a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a @click="$emit('change-month',1,user.main)" class="dropdown-item" href="#">Mes 1</a>
        <div class="dropdown-divider"></div>
        <a @click="$emit('change-month',2,user.main)" class="dropdown-item" href="#">Mes 2</a>
        <div class="dropdown-divider"></div>
        <a @click="$emit('change-month',3,user.main)" class="dropdown-item" href="#">Mes 3</a>
      </div>
    </div>

    <div class="box">
      <router-link to="/workout">
        <div
          class="day"
          v-bind:class="{'is-completed':day.completed}"
          v-bind:key="day.day"
          v-for="day in user.calendar.days"
          @click="getWorkOutInfo(day.day),$emit('setWork-Data',workOutInfo)"
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
      workOutInfo: {}
    };
  },
  //name: "Calendario",
  props: ["user", "workouts"],
  created() {
  },
  methods: {
    getWorkOutInfo(day) {
      let data = {};
      this.workouts.all.map(x => {
        if (
          x.type == this.user.nWorkout.type && 
          x.month == this.user.calendar.month &&
          x.day == day
        ) {
          data = x;
        }
      });
      this.workOutInfo = data.workout;
    },
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