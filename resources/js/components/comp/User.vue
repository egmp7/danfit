<template>
  <div>
    <!-- USER -->
    <div id="user">
      <div class="row align-items-center">
        <div class="col-3">
          <img v-bind:src="'../storage/user_image/'+user.user_image" alt="user_img" />
        </div>
        <div class="col-9">
          <div class="user-info">
            <p>{{user.name}}</p>
            <div class="progress">
              <div
                class="progress-bar progress-bar-striped"
                role="progressbar"
                v-bind:style="'width:'+ progressBarData + '%'"
                aria-valuemin="0"
                aria-valuemax="100"
              >
                <span>Progreso Completado</span>
              </div>
            </div>
            <p>DÍA {{nWorkout.day}}</p>
            <p>MES {{nWorkout.month}}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- TODAY'S WORKOUT -->
    <div id="today">
      <h2>WORKOUT DEL DÍA</h2>
      <img src="/../img/workout.jpg" alt="Workout del dia" />
      <h3>{{workOutInfo.name}}</h3>
      <div class="row">
        <div class="col-md-8">
          <p>{{workOutInfo.description}}</p>
        </div>
        <div class="col-md-4">
          <router-link to="/workout">
            <button
              class="btn btn-primary btn-lg btn-block"
              @click="$emit('setWork-Data',workOutInfo.workout)"
            >Empezar</button>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      progressBarData: [],
      workOutInfo: []
    };
  },
  name: "User",
  props: ["user", "workouts", "nWorkout", "workOutData"],
  created() {
    this.getProgressBar(this.user.progress, this.nWorkout);
    this.getWorkOutInfo();
  },
  methods: {
    getProgressBar(progress, nWorkout) {
      let counter = 0;
      progress.map(x => {
        if (x.month == nWorkout.month && x.type == nWorkout.type) {
          counter++;
        }
      });
      this.progressBarData = (counter / 28) * 100;
    },
    getWorkOutInfo() {
      this.workouts.map(x => {
        if (
          x.type == this.nWorkout.type &&
          x.month == this.nWorkout.month &&
          x.day == this.nWorkout.day
        ) {
          this.workOutInfo = x;
        }
      });
    }
  }
};
</script>