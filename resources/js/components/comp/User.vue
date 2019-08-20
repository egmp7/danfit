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
      <h3>{{workouts[0].name}}</h3>
      <div class="row">
        <div class="col-md-8">
          <p>{{workouts[0].description}}</p>
        </div>
        <div class="col-md-4">
          <button class="btn btn-primary btn-lg btn-block">Empezar</button>
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
    };
  },
  //name: "User",
  props: ["user", "workouts", "nWorkout"],
  created() {
    this.progressBar(this.user.progress, this.nWorkout);
  },
  methods: {
    progressBar(progress, nWorkout) {
      let counter = 0;
      progress.map(x => {
        if (
          x.month == nWorkout.month &&
          x.type == nWorkout.type
        ) {
          counter++;
        }
      });
      this.progressBarData = (counter / 28) * 100;
    }
  }
};
</script>