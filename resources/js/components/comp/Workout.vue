<template>
  <div>
    <h2>WORKOUT</h2>
    <div v-for="video in videos" v-bind:key="video.id0">
      <video width="320" height="200" v-bind:id="video.id" v-bind:class="{'show':video.show}">
        <source v-bind:src="'/../storage/workouts/'+video.video+'.mp4'" type="video/mp4" />
      </video>
    </div>
    <div class="wrap">
      <div v-for="video in videos" v-bind:key="video.id1">
        <button class="buttons btn" @click="pick(video.id)">Click me {{video.id}}</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["workouts"],
  data() {
    return {
      videos: []
    };
  },
  created() {
    this.getVideoObjects(this.workouts.workOutData);
  },
  methods: {
    getVideoObjects(workOutData) {
      let counter = 0;
      workOutData = '1,2,3,4,5,6,7,8,9'             // TESTING PUPOSES <---------------
      workOutData = workOutData.split(",");

      workOutData.map(x => {
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
      this.videos.map(x => {
        if (x.id == id) {
          x.show = true;
        }
      });

      //PAUSE VIDEOS AND HIDE
      this.videos.map(x => {
        if (x.id !== id) {
          x.show = false;
          let vidPause = document.getElementById(x.id);
          vidPause.pause();
        }
      });
    }
  }
};
</script>

<style scoped>
h2 {
  margin-bottom: 0;
  margin-top: 10px;
}
video {
  display: none !important;
  margin: 0 auto;
  width: 100%;
  margin-bottom: 20px;
}
.show {
  display: block !important;
}
.wrap {
  border: solid #5ea6e4 3px;
  border-radius: 3px;
  height: 35vh;
  overflow: scroll;
}
.buttons {
  background: #c7e5ff;
  border-bottom: solid #75b6ef 1px;
  width: 100%;
  border-radius: 0;
  text-align: left;
  color: #1369b6;
}
</style>