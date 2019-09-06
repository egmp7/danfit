<template>
  <div class="workout">
    <h2>{{workouts.workOutData.name}}</h2>
    <div v-for="video in videos" v-bind:key="video.id">
      <video width="320" height="200" v-bind:id="video.id" v-bind:class="{'show':video.show}">
        <source v-bind:src="'/../storage/workouts/'+video.videoId+'.mp4'" type="video/mp4" />
      </video>
    </div>
    <div class="exerciseInfo">
      <h3>{{exerciseInfo}}</h3>
    </div>
    <div class="action">
      <button id="start" @click="empezar()" class="btn btn-success btn-block">Empezar!</button>
    </div>
    <div class="wrap">
      <div v-for="button in buttons" v-bind:key="button.id">
        <button
          v-bind:id="button.id"
          v-bind:class="{'completed':button.completed,'title':button.title}"
          class="buttons btn"
          @click="pick(button.id)"
        >
          {{button.name}}
          <span>
            <i class="fas fa-check-circle"></i>
          </span>
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["workouts", "user"],
  data() {
    return {
      videos: [],
      buttonsInfo: [],
      exerciseInfo: "",
      buttons: [],
      saveWorkout: {}
    };
  },
  created() {
    this.getButtons();
  },
  methods: {
    getButtons() {
      let workOutData = this.workouts.workOutData.workout.split(",");
      let data = {};
      let counter = 0;
      let regex1 = /^i/;
      let regex2 = /^o/;
      workOutData.map(x => {
        // IF VIDEO
        if (!isNaN(parseInt(x))) {
          data = {
            id: "btn" + counter,
            name: this.getButtonName(x),
            completed: false
          };
          this.buttons.push(data);
          this.getVideo(x, counter);
          counter++;
        }
        //IF VIDEO (OPTIONAL)
        else if (regex2.test(x)) {
          data = {
            id: "btn" + counter,
            name: this.getButtonName(x.replace("o ", "")) + " (opcional)",
            completed: false
          };
          this.buttons.push(data);
          this.getVideo(x.replace("o ", ""), counter);
          counter++;
        }
        //IF INFO
        else if (regex1.test(x)) {
          this.buttonsInfo.push(x.replace("i ", ""));
        }
        //IF BUTTON TITLE
        else {
          data = {
            title: true,
            name: x
          };
          this.buttons.push(data);
        }
      });
    },
    getButtonName(id) {
      let data = null;
      this.workouts.workoutsInfo.map(x => {
        if (x.id == id) {
          data = x.name;
        }
      });
      return data;
    },
    getVideo(videoId, id) {
      let video = {};
      if (id == 0) {
        video = {
          id: id,
          videoId: videoId,
          show: true
        };
        this.videos.push(video);
      } else {
        video = {
          id: id,
          videoId: videoId,
          show: false
        };
        this.videos.push(video);
      }
    },
    infoExercise(id) {
      this.exerciseInfo = this.buttonsInfo[id];
    },
    pick(id) {
      let videoId = parseInt(id.match(/\d+/g));
      this.infoExercise(videoId);

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
      // HIDE START BUTTON
      document.getElementById("start").style.display = "none";
    },
    empezar() {
      let videos = document.getElementsByTagName("video");
      videos[0].play();
      videos[0].loop = true;
      this.infoExercise(0);
      this.buttons[1].completed = true;
      document.getElementById("start").style.display = "none";
    },
    checkToSave() {
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
.workout h2 {
  font-size: 28px;
  margin-bottom: 5px;
  margin-top: 10px;
}
.workout h3 {
  font-size: 24px;
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
.exerciseInfo {
  text-align: center;
  position: relative;
  top: -8px;
}
.wrap {
  border: solid #5ea6e4 3px;
  border-radius: 3px;
  max-height: 35vh;
  overflow: scroll;
}
.title {
  background: #3490dc !important;
  color: white !important;
  box-shadow: none !important;
}
.buttons {
  background: #e6f3ff;
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
</style>