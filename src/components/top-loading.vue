<template>
  <transition v-if="loggedIn" name="fade">
    <div class="load-bar" :style="{ opacity: !loading ? 0 : 1 }">
      <div class="load-bar-container">
        <div class="load-bar-base base1" :style="{ background: col_1 }">
          <div class="color red" :style="{ background: col_2 }" />
          <div class="color blue" :style="{ background: col_3 }" />
          <div class="color yellow" :style="{ background: col_4 }" />
          <div class="color green" :style="{ background: col_1 }" />
        </div>
      </div>
      <div class="load-bar-container">
        <div class="load-bar-base base2" :style="{ background: col_1 }">
          <div class="color red" :style="{ background: col_2 }" />
          <div class="color blue" :style="{ background: col_3 }" />
          <div class="color yellow" :style="{ background: col_4 }" />
          <div class="color green" :style="{ background: col_1 }" />
        </div>
      </div>
    </div>
  </transition>
</template>

<script lang="ts" setup>
let loggedIn = true
let loading = false
let col_1: string = '#159756'
let col_2: string = '#da4733'
let col_3: string = '#3b78e7'
let col_4: string = '#fdba2c'
// let display: string = 'none'
// let timeout: Number = 3000
// export default {
//   data: () => ({
//     col_1: '#159756',
//     col_2: '#da4733',
//     col_3: '#3b78e7',
//     col_4: '#fdba2c',
//     display: 'none',
//     timeout: 3000,
//     proc: null
//   }),
//   computed: {
//     loading () {
//       return this.$store.state.loading
//     }
//   },
//   methods: {
//     start () {
//       const vm = this
//       vm.proc = setTimeout(() => {
//         vm.$store.commit('loading', true)
//         vm.proc = null
//       }, 1000)
//     },
//     finish () {
//       this.$store.commit('loading', false)
//       if (this.proc != null) { clearTimeout(this.proc) }
//       this.proc = null
//     }
//   }
// }
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 3s;
}

.fade-enter,
.fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}

.load-bar {
  position: fixed;
  top: 50px;
  height: 4px;
  width: 100%;
  opacity: 1;
  z-index: 1;
  -webkit-transition: opacity 0.2s linear;
  transition: opacity 0.2s linear;
}

.load-bar.invisible {
  opacity: 0;
  -webkit-transition: opacity 0.2s linear;
  transition: opacity 0.2s linear;
}

.load-bar-container {
  float: left;
  width: 50%;
  height: 100%;
  overflow: hidden;
}

.load-bar .load-bar-container:last-child {
  float: right;
  transform-origin: top right;
  -moz-transform-origin: top right;
  -ms-transform-origin: top right;
  -webkit-transform-origin: top right;
}

.load-bar-base {
  float: left;
  width: 100%;
  height: 100%;
  overflow: hidden;
  position: relative;
  background: #159756;
}

.color {
  width: 100%;
  height: 100%;
  float: left;
  position: absolute;
}

.base1 .red {
  background: #da4733;
  -webkit-animation: move_left_red 4s infinite linear;
  -moz-animation: move_left_red 4s infinite linear;
  -ms-animation: move_left_red 4s infinite linear;
  animation: move_left_red 4s infinite linear;
}

.base1 .blue {
  background: #3b78e7;
  -webkit-animation: move_left_blue 4s infinite linear;
  -moz-animation: move_left_blue 4s infinite linear;
  -ms-animation: move_left_blue 4s infinite linear;
  animation: move_left_blue 4s infinite linear;
}

.base1 .yellow {
  background: #fdba2c;
  -webkit-animation: move_left_yellow 4s infinite linear;
  -moz-animation: move_left_yellow 4s infinite linear;
  -ms-animation: move_left_yellow 4s infinite linear;
  animation: move_left_yellow 4s infinite linear;
}

.base1 .green {
  background: #159756;
  -webkit-animation: move_left_green 4s infinite linear;
  -moz-animation: move_left_green 4s infinite linear;
  -ms-animation: move_left_green 4s infinite linear;
  animation: move_left_green 4s infinite linear;
}

@-webkit-keyframes move_left_red {
  0% {
    -webkit-transform: translateX(100%);
  }

  25% {
    -webkit-transform: translateX(0%);
  }

  50% {
    -webkit-transform: translateX(0%);
  }

  75% {
    -webkit-transform: translateX(0%);
  }

  100% {
    -webkit-transform: translateX(0%);
  }
}

@-moz-keyframes move_left_red {
  0% {
    -moz-transform: translateX(100%);
  }

  25% {
    -moz-transform: translateX(0%);
  }

  50% {
    -moz-transform: translateX(0%);
  }

  75% {
    -moz-transform: translateX(0%);
  }

  100% {
    -moz-transform: translateX(0%);
  }
}

@-ms-keyframes move_left_red {
  0% {
    -ms-transform: translateX(100%);
  }

  25% {
    -ms-transform: translateX(0%);
  }

  50% {
    -ms-transform: translateX(0%);
  }

  75% {
    -ms-transform: translateX(0%);
  }

  100% {
    -ms-transform: translateX(0%);
  }
}

@keyframes move_left_red {
  0% {
    transform: translateX(100%);
  }

  25% {
    transform: translateX(0%);
  }

  50% {
    transform: translateX(0%);
  }

  75% {
    transform: translateX(0%);
  }

  100% {
    transform: translateX(0%);
  }
}

@-webkit-keyframes move_left_blue {
  0% {
    -webkit-transform: translateX(100%);
  }

  25% {
    -webkit-transform: translateX(100%);
  }

  50% {
    -webkit-transform: translateX(0%);
  }

  75% {
    -webkit-transform: translateX(0%);
  }

  100% {
    -webkit-transform: translateX(0%);
  }
}

@-moz-keyframes move_left_blue {
  0% {
    -moz-transform: translateX(100%);
  }

  25% {
    -moz-transform: translateX(100%);
  }

  50% {
    -moz-transform: translateX(0%);
  }

  75% {
    -moz-transform: translateX(0%);
  }

  100% {
    -moz-transform: translateX(0%);
  }
}

@-ms-keyframes move_left_blue {
  0% {
    -ms-transform: translateX(100%);
  }

  25% {
    -ms-transform: translateX(100%);
  }

  50% {
    -ms-transform: translateX(0%);
  }

  75% {
    -ms-transform: translateX(0%);
  }

  100% {
    -ms-transform: translateX(0%);
  }
}

@keyframes move_left_blue {
  0% {
    transform: translateX(100%);
  }

  25% {
    transform: translateX(100%);
  }

  50% {
    transform: translateX(0%);
  }

  75% {
    transform: translateX(0%);
  }

  100% {
    transform: translateX(0%);
  }
}

@-webkit-keyframes move_left_yellow {
  0% {
    -webkit-transform: translateX(100%);
  }

  25% {
    -webkit-transform: translateX(100%);
  }

  50% {
    -webkit-transform: translateX(100%);
  }

  75% {
    -webkit-transform: translateX(0%);
  }

  100% {
    -webkit-transform: translateX(0%);
  }
}

@-moz-keyframes move_left_yellow {
  0% {
    -moz-transform: translateX(100%);
  }

  25% {
    -moz-transform: translateX(100%);
  }

  50% {
    -moz-transform: translateX(100%);
  }

  75% {
    -moz-transform: translateX(0%);
  }

  100% {
    -moz-transform: translateX(0%);
  }
}

@-ms-keyframes move_left_yellow {
  0% {
    -ms-transform: translateX(100%);
  }

  25% {
    -ms-transform: translateX(100%);
  }

  50% {
    -ms-transform: translateX(100%);
  }

  75% {
    -ms-transform: translateX(0%);
  }

  100% {
    -ms-transform: translateX(0%);
  }
}

@keyframes move_left_yellow {
  0% {
    transform: translateX(100%);
  }

  25% {
    transform: translateX(100%);
  }

  50% {
    transform: translateX(100%);
  }

  75% {
    transform: translateX(0%);
  }

  100% {
    transform: translateX(0%);
  }
}

@-webkit-keyframes move_left_green {
  0% {
    -webkit-transform: translateX(100%);
  }

  25% {
    -webkit-transform: translateX(100%);
  }

  50% {
    -webkit-transform: translateX(100%);
  }

  75% {
    -webkit-transform: translateX(100%);
  }

  100% {
    -webkit-transform: translateX(0%);
  }
}

@-moz-keyframes move_left_green {
  0% {
    -moz-transform: translateX(100%);
  }

  25% {
    -moz-transform: translateX(100%);
  }

  50% {
    -moz-transform: translateX(100%);
  }

  75% {
    -moz-transform: translateX(100%);
  }

  100% {
    -moz-transform: translateX(0%);
  }
}

@-ms-keyframes move_left_green {
  0% {
    -ms-transform: translateX(100%);
  }

  25% {
    -ms-transform: translateX(100%);
  }

  50% {
    -ms-transform: translateX(100%);
  }

  75% {
    -ms-transform: translateX(100%);
  }

  100% {
    -ms-transform: translateX(0%);
  }
}

@keyframes move_left_green {
  0% {
    transform: translateX(100%);
  }

  25% {
    transform: translateX(100%);
  }

  50% {
    transform: translateX(100%);
  }

  75% {
    transform: translateX(100%);
  }

  100% {
    transform: translateX(0%);
  }
}

.base2 .red {
  background: #da4733;
  -webkit-animation: move_right_red 4s infinite linear;
  -moz-animation: move_right_red 4s infinite linear;
  -ms-animation: move_right_red 4s infinite linear;
  animation: move_right_red 4s infinite linear;
}

.base2 .blue {
  background: #3b78e7;
  -webkit-animation: move_right_blue 4s infinite linear;
  -moz-animation: move_right_blue 4s infinite linear;
  -ms-animation: move_right_blue 4s infinite linear;
  animation: move_right_blue 4s infinite linear;
}

.base2 .yellow {
  background: #fdba2c;
  -webkit-animation: move_right_yellow 4s infinite linear;
  -moz-animation: move_right_yellow 4s infinite linear;
  -ms-animation: move_right_yellow 4s infinite linear;
  animation: move_right_yellow 4s infinite linear;
}

.base2 .green {
  background: #159756;
  -webkit-animation: move_right_green 4s infinite linear;
  -moz-animation: move_right_green 4s infinite linear;
  -ms-animation: move_right_green 4s infinite linear;
  animation: move_right_green 4s infinite linear;
}

@-webkit-keyframes move_right_red {
  0% {
    -webkit-transform: translateX(-100%);
  }

  25% {
    -webkit-transform: translateX(0%);
  }

  50% {
    -webkit-transform: translateX(0%);
  }

  75% {
    -webkit-transform: translateX(0%);
  }

  100% {
    -webkit-transform: translateX(0%);
  }
}

@-moz-keyframes move_right_red {
  0% {
    -moz-transform: translateX(-100%);
  }

  25% {
    -moz-transform: translateX(0%);
  }

  50% {
    -moz-transform: translateX(0%);
  }

  75% {
    -moz-transform: translateX(0%);
  }

  100% {
    -moz-transform: translateX(0%);
  }
}

@-ms-keyframes move_right_red {
  0% {
    -ms-transform: translateX(-100%);
  }

  25% {
    -ms-transform: translateX(0%);
  }

  50% {
    -ms-transform: translateX(0%);
  }

  75% {
    -ms-transform: translateX(0%);
  }

  100% {
    -ms-transform: translateX(0%);
  }
}

@keyframes move_right_red {
  0% {
    transform: translateX(-100%);
  }

  25% {
    transform: translateX(0%);
  }

  50% {
    transform: translateX(0%);
  }

  75% {
    transform: translateX(0%);
  }

  100% {
    transform: translateX(0%);
  }
}

@-webkit-keyframes move_right_blue {
  0% {
    -webkit-transform: translateX(-100%);
  }

  25% {
    -webkit-transform: translateX(-100%);
  }

  50% {
    -webkit-transform: translateX(0%);
  }

  75% {
    -webkit-transform: translateX(0%);
  }

  100% {
    -webkit-transform: translateX(0%);
  }
}

@-moz-keyframes move_right_blue {
  0% {
    -moz-transform: translateX(-100%);
  }

  25% {
    -moz-transform: translateX(-100%);
  }

  50% {
    -moz-transform: translateX(0%);
  }

  75% {
    -moz-transform: translateX(0%);
  }

  100% {
    -moz-transform: translateX(0%);
  }
}

@-ms-keyframes move_right_blue {
  0% {
    -ms-transform: translateX(-100%);
  }

  25% {
    -ms-transform: translateX(-100%);
  }

  50% {
    -ms-transform: translateX(0%);
  }

  75% {
    -ms-transform: translateX(0%);
  }

  100% {
    -ms-transform: translateX(0%);
  }
}

@keyframes move_right_blue {
  0% {
    transform: translateX(-100%);
  }

  25% {
    transform: translateX(-100%);
  }

  50% {
    transform: translateX(0%);
  }

  75% {
    transform: translateX(0%);
  }

  100% {
    transform: translateX(0%);
  }
}

@-webkit-keyframes move_right_yellow {
  0% {
    -webkit-transform: translateX(-100%);
  }

  25% {
    -webkit-transform: translateX(-100%);
  }

  50% {
    -webkit-transform: translateX(-100%);
  }

  75% {
    -webkit-transform: translateX(0%);
  }

  100% {
    -webkit-transform: translateX(0%);
  }
}

@-moz-keyframes move_right_yellow {
  0% {
    -moz-transform: translateX(-100%);
  }

  25% {
    -moz-transform: translateX(-100%);
  }

  50% {
    -moz-transform: translateX(-100%);
  }

  75% {
    -moz-transform: translateX(0%);
  }

  100% {
    -moz-transform: translateX(0%);
  }
}

@-ms-keyframes move_right_yellow {
  0% {
    -ms-transform: translateX(-100%);
  }

  25% {
    -ms-transform: translateX(-100%);
  }

  50% {
    -ms-transform: translateX(-100%);
  }

  75% {
    -ms-transform: translateX(0%);
  }

  100% {
    -ms-transform: translateX(0%);
  }
}

@keyframes move_right_yellow {
  0% {
    transform: translateX(-100%);
  }

  25% {
    transform: translateX(-100%);
  }

  50% {
    transform: translateX(-100%);
  }

  75% {
    transform: translateX(0%);
  }

  100% {
    transform: translateX(0%);
  }
}

@-webkit-keyframes move_right_green {
  0% {
    -webkit-transform: translateX(-100%);
  }

  25% {
    -webkit-transform: translateX(-100%);
  }

  50% {
    -webkit-transform: translateX(-100%);
  }

  75% {
    -webkit-transform: translateX(-100%);
  }

  100% {
    -webkit-transform: translateX(0%);
  }
}

@-moz-keyframes move_right_green {
  0% {
    -moz-transform: translateX(-100%);
  }

  25% {
    -moz-transform: translateX(-100%);
  }

  50% {
    -moz-transform: translateX(-100%);
  }

  75% {
    -moz-transform: translateX(-100%);
  }

  100% {
    -moz-transform: translateX(0%);
  }
}

@-ms-keyframes move_right_green {
  0% {
    -ms-transform: translateX(-100%);
  }

  25% {
    -ms-transform: translateX(-100%);
  }

  50% {
    -ms-transform: translateX(-100%);
  }

  75% {
    -ms-transform: translateX(-100%);
  }

  100% {
    -ms-transform: translateX(0%);
  }
}

@keyframes move_right_green {
  0% {
    transform: translateX(-100%);
  }

  25% {
    transform: translateX(-100%);
  }

  50% {
    transform: translateX(-100%);
  }

  75% {
    transform: translateX(-100%);
  }

  100% {
    transform: translateX(0%);
  }
}
</style>
