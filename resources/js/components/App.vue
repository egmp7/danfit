<template>
  <router-view v-bind:user="user" v-bind:workouts="workouts"></router-view>
</template>

<script>
import Calendario from "./comp/Calendario";
import Configuracion from "./comp/Configuracion";
import Tipo from "./comp/Tipo";
import User from "./comp/User";

export default {
    name:'app',
    components:{
        User,
        Configuracion
    },
  data() {
    return {
      user: {},
      workouts: {}
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
          console.log(this.user);
        });
    },
    fetchWorkouts() {
      fetch("../api/workouts/")
        .then(res => res.json())
        .then(res => {
          this.workouts = res.data;
          console.log(this.workouts);
        });
    },
    userId() {
      var id = window.location.pathname.slice(11);
      return id;
    }
  }
};
</script>