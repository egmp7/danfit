<template>
  <div>
    <h2>WORKOUT</h2>
    <div v-for="video in videos" v-bind:key="video.id0">
      <video width="320" height="240" v-bind:id="video.id" v-bind:class="{'show':video.show}">
        <source v-bind:src="'/../storage/workouts/'+video.video+'.mp4'" type="video/mp4" />
      </video>
    </div>
    <div class="option btn btn-block" v-for="video in videos" v-bind:key="video.id1">
      <button @click="pick(video.id)">Click me {{video.id}}</button>
      
    </div>
  </div>
</template>
<script>
export default {
  //name:Workout,
  props: ["workOutData"],
  data() {
    return {
      videos: []
    };
  },
  created() {
    this.getVideoObjects();
  },
  methods: {
    getVideoObjects() {
      let counter = 0;
      this.workOutData.map(x => {
        if (counter == 0) {
          let object = {
            id: counter,
            video: x,
            show: true
          };
          counter++;
          this.videos.push(object);
        } else {
          let object = {
            id: counter,
            video: x,
            show: false
          };
          counter++;
          this.videos.push(object);
        }
      });
    },
    pick(id) {
      //PLAY VIDEO AND SHOW
      document.getElementById(id).loop = true;
      let vid = document.getElementById(id);
      vid.play();
      this.videos.map(x=>{
          if (x.id == id) {
              x.show = true;
          }
      })

      //PAUSE VIDEOS AND HIDE
      this.videos.map(x => {
        if (x.id !== id) {
            x.show =false;
          let vidPause = document.getElementById(x.id);
          vidPause.pause();
        }
      });
    }
  }
};
</script>

<style scoped>
video {
  display: none !important;
}
.show {
  display: block !important;
}
</style>