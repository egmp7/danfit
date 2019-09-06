<template>
  <!-- USER -->
  <div id="user" v-if="this.user.api">
    <div class="block">
      <img v-bind:src="'../storage/user_image/'+user.api.user_image" alt="user_img" />
      <div class="text">
        <p>Hola!</p>
        <p>{{user.api.name}}</p>
      </div>
    </div>

    <div id="today" v-if="this.user.today">
      <h2>Entrenamiento del Día</h2>
      <img src="/../img/workout.jpg" alt="Workout del dia" />
      <h3>{{user.today.workout.name}}</h3>
      <div class="row">
        <div class="col-md-8">
          <p>{{user.today.workout.description}}</p>
        </div>
        <div class="col-md-4">
          <router-link to="/workout">
            <button
              class="btn btn-primary btn-lg btn-block"
              @click="$emit('setWork-Data',user.today.workout)"
            >Comenzar!</button>
          </router-link>
        </div>
      </div>
    </div>

    <!-- <div class="row align-items-center">
        <div class="col-3">
          <img v-bind:src="'../storage/user_image/'+user.main.user_image" alt="user_img" />
        </div>
        <div class="col-9">
          <div class="user-info">
            <p>{{user.main.name}}</p>
            <div class="progress">
              <div
                class="progress-bar progress-bar-striped"
                role="progressbar"
                v-bind:style="'width:'+ user.progressBar + '%'"
                aria-valuemin="0"
                aria-valuemax="100"
              >
                <span>Progreso Completado</span>
              </div>
            </div>
            <p>DÍA {{user.nWorkout.day}}</p>
            <p>MES {{user.nWorkout.month}}</p>
          </div>
        </div>
      </div>
    </div>
     TODAY'S WORKOUT 
    <div id="today">
      <h2>WORKOUT DEL DÍA</h2>
      <img src="/../img/workout.jpg" alt="Workout del dia" />
      <h3>{{workouts.next.name}}</h3>
      <div class="row">
        <div class="col-md-8">
          <p>{{workouts.next.description}}</p>
        </div>
        <div class="col-md-4">
          <router-link to="/workout">
            <button
              class="btn btn-primary btn-lg btn-block"
              @click="$emit('setWork-Data',workouts.next)"
            >Empezar</button>
          </router-link>
        </div>
    </div>-->
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  name: "User",
  props: ["user", "workouts"],
  created() {},
  methods: {}
};
</script>