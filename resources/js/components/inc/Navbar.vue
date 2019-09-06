<template>
  <div id="navbar" v-on:setWorkOutData="setWorkOutData">
    <div class="block">
      <div class="logo">
        <img src="/img/logo.png" alt="DanFitCenter_logo" />
      </div>
    </div>
    <div class="menu">
      <router-link to="/">
        <div class="element">
          <i class="fas fa-tachometer-alt fa-2x"></i>
          <p>Dashboard</p>
        </div>
      </router-link>
      <router-link to="/programa">
        <div class="element">
          <i class="fas fa-calendar-alt fa-2x"></i>
          <p>Programa</p>
        </div>
      </router-link>
      <router-link to="/workouts">
        <div class="element">
          <i class="fas fa-dumbbell fa-2x"></i>
          <p>Workouts</p>
        </div>
      </router-link>
      <div class="element">
        <i class="fas fa-utensils fa-2x"></i>
        <p>Nutrición</p>
      </div>
      <div class="element">
        <i class="fas fa-gem fa-2x"></i>
        <p>Bonus</p>
      </div>
      <div class="element">
        <i class="fab fa-facebook-square fa-2x"></i>
        <p>Ayuda</p>
      </div>
      <!-- <router-link to="/configuracion"> -->
        <div class="element">
          <i class="fas fa-cogs fa-2x"></i>
          <p>Config</p>
        </div>
      <!-- </router-link> -->
    </div>
  </div>
</template>

<script>
export default {
  props: ["user"],
  methods: {
    setWorkOutData() {
      console.log("esto es la nav perro");
    }
  }
};
</script>