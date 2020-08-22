<template>
  <b-container>
    <b-row>
      <b-col xl="16" lg="19" md="28">
        <b-carousel
          :interval="4000"
          controls
          img-width="512"
          img-height="288"
          style="box-shadow: 0 0 6px #676767ad;"
          @sliding-start="onSlideStart"
          @sliding-end="onSlideEnd"
        >
          <b-carousel-slide
            v-for="(e, i) in slideSouce"
            :key="i"
            :caption="e.src ? e.caption : null"
            :text="e.src ? e.text : null"
            :img-src="e.src || '/carousel/noimage.png'"
          />
        </b-carousel>
      </b-col>
      <b-col>
        <h6>Top Topics</h6>
      </b-col>
    </b-row>
    <b-row class="mt-3">
      <b-col>
        <b-breadcrumb :items="items" />
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  auth: false,
  data () {
    return {
      items: [
        { text: 'หน้าหลัก', active: true }
      ],
      slide: '',
      slideSouce: [
        { src: '/carousel/nami.png', caption: 'nami', text: '' },
        { src: '/carousel/brook.png', caption: 'Brook', text: '' },
        { src: '/carousel/chopper.png', caption: 'Chopper', text: '' },
        { src: '/carousel/robin.png', caption: 'robin', text: '' },
        { src: '/carousel/solo.png', caption: 'solo', text: '' },
        { src: '/carousel/sunji.png', caption: 'sunji', text: '' },
        { src: null, caption: 'Lufee', text: '' },
        { src: '/carousel/usop.png', caption: 'usop', text: '' }
      ],
      sliding: null
    }
  },
  methods: {
    onSlideStart (slide) {
      this.sliding = true
    },
    onSlideEnd (slide) {
      this.sliding = false
    }
  }
}
</script>
