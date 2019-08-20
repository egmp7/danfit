<template>
  <div>
    <h2>WORKOUT</h2>
    <video v-for="exercise in workOutData" v-bind:key="exercise" width="320" height="240" autoplay>
      <source v-bind:src="'/../storage/workouts/'+exercise+'.mp4'" type="video/mp4" />
    </video>
  </div>
</template>
<script>
export default {
  //name:Workout,
  props: ["workOutData"]
};
</script>