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
        <a class="dropdown-item" href="#">Mes 1</a>
        <a class="dropdown-item" href="#">Mes 2</a>
        <a class="dropdown-item" href="#">Mes 3</a>
      </div>
    </div>

    <div class="box">
      <div class="day" v-bind:key="n" v-for="n in 24">
        <p>{{n}}</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      days: {
        day:'',
        done: false
      }
    };
  },
  name: "Calendario",
  props: ["user", "nWorkout"],
  created() {
    this.progressDays(this.user.progress);
  },
  methods: {
    progressDays(user) {
      user.map(x => {});
    }
  }
};
</script>