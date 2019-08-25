<template>
  <div>
    <h2>WORKOUT</h2>
    <div v-for="video in videos" v-bind:key="video.id">
      <video width="320" height="200" v-bind:id="video.id" v-bind:class="{'show':video.show}">
        <source v-bind:src="'/../storage/workouts/'+video.id+'.mp4'" type="video/mp4" />
      </video>
    </div>
    <div class="action">
      <button @click="empezar()" class="top btn btn-primary">Empezar!</button>
      <a href="/">
        <button
          @click="check(),$emit('save-workout',saveWorkout)"
          class="btn btn-success top"
        >Finalizado!</button>
      </a>
    </div>
    <div class="wrap">
      <div v-for="button in buttons" v-bind:key="button.id">
        <button
          v-bind:id="button.id"
          v-bind:class="{'completed':button.completed}"
          class="buttons btn"
          @click="pick(button.id)"
        >
          Click me {{button.id}}
          <span>
            <i class="fas fa-check-circle"></i>
          </span>
        </button>
      </div>
    </div>
    <div class="action">
      <a href="/">
        <button
          @click="check(),$emit('save-workout',saveWorkout)"
          class="btn btn-success btn-block"
        >Finalizado!</button>
      </a>
    </div>
  </div>
</template>
<script>
export default {
  props: ["workouts", "user"],
  data() {
    return {
      videos: [],
      buttons: [],
      saveWorkout: {}
    };
  },
  created() {
    this.getVideos(this.workouts.workOutData);
    this.getButtons();
  },
  methods: {
    getVideos(workOutData) {
      let counter = 0;
      workOutData = workOutData.split(",");

      workOutData.map(x => {
        let video = {};
        if (counter == 0) {
          video = {
            id: x,
            show: true
          };
          counter++;
          this.videos.push(video);
        } else {
          video = {
            id: x,
            show: false
          };
          this.videos.push(video);
        }
      });
    },
    getButtons() {
      this.videos.map(x => {
        let data = {
          id: "btn" + x.id,
          name: "",
          active: false,
          completed: false
        };
        this.buttons.push(data);
      });
    },
    pick(id) {
      let videoId = parseInt(id.match(/\d+/g));
      //PLAY VIDEO AND SHOW
      this.videos.map(x => {
        if (x.id == videoId) {
          x.show = true;
          let vid = document.getElementById(x.id);
          vid.loop = true;
          vid.play();
        }
        //PAUSE VIDEOS AND HIDE
        else {
          x.show = false;
          let vid = document.getElementById(x.id);
          vid.pause();
        }
      });
      //COMPLETED ACTION
      this.buttons.map(x => {
        if (x.id == id) {
          x.completed = true;
        }
      });
    },
    empezar(){
        let videos = document.getElementsByTagName('video')
        videos[0].play()
        videos[0].loop=true
        this.buttons[0].completed =true
    },
    check() {
      let data = this.user.nWorkout;
      let exists = false;
      //CHECK IF PROGRESS ELEMENT EXISTS
      this.user.main.progress.map(x => {
        if (x.type == data.type && x.month == data.month && x.day == data.day) {
          exists = true;
        }
      });
      if (exists == false) {
        this.saveWorkout = data;
      }
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
  position: relative;
}
.btn:focus {
  background: rgb(181, 211, 250);
}
.buttons span {
  display: none;
}
.completed span {
  position: absolute;
  right: 5px;
  display: inline;
  color: green;
}

.action .btn {
  margin: 10px 0;
}
.action .top {
  margin-top: 0;
}
</style>