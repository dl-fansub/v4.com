<template>
  <b-container>
    <b-row>
      <b-col xl="24" lg="24" md="24">
        <b-carousel
          :interval="4000"
          controls
          img-width="512"
          img-height="288"
          class="mt-0 m-3"
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
        <div class="fb-page">
          <h6 class="border-bottom p-2 px-1">
            DL-Fansub
          </h6>
          <iframe
            src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FDL.Fansub%2F&width=280&layout=standard&action=like&size=large&share=true&height=35&appId=755065711974797"
            width="280"
            height="35"
            style="border: none; overflow: hidden;"
            scrolling="no"
            frameborder="0"
            allowTransparency="true"
            allow="encrypted-media"
          />
        </div>
        <div class="discord-page">
          <h6 class="border-bottom p-2 px-1">
            Join our communities
          </h6>
          <div class="text-center">
            <img src="~/assets/qr-discord-gg.svg" width="160" height="160" alt="">
            <b-button :href="$store.state.inviteDiscord" target="_blank" class="mt-2" block>
              <fa :icon="['fab','discord']" /> Discord Community.
            </b-button>
          </div>
        </div>
      </b-col>
    </b-row>
    <b-row class="mt-3">
      <b-col sm="36">
        <b-breadcrumb :items="items" />
      </b-col>
      <b-col sm="24">
        <h6 class="border-bottom p-2 px-1">
          ซีซั่นที่กำลังจะฉาย
        </h6>
      </b-col>
      <b-col sm="12">
        <h6 class="border-bottom p-2 px-1">
          อนิเมะประจำซีซั่น
        </h6>
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
        { src: null, caption: null, text: '' },
        { src: null, caption: null, text: '' },
        { src: null, caption: null, text: '' },
        { src: null, caption: null, text: '' },
        { src: null, caption: null, text: '' },
        { src: null, caption: null, text: '' },
        { src: null, caption: null, text: '' },
        { src: null, caption: null, text: '' }
      ],
      sliding: null,
      animeSeason: [
        {
          name: 'Re:ZERO -Starting Life in Another World- Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108632-Z8LOaPpYPK93.jpg'
        },
        {
          name: 'The God of High School',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx116006-XasdW0bB4n18.png'
        },
        {
          name: 'Fire Force Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114236-lSQF4ljWQXdU.jpg'
        },
        {
          name: 'My Teen Romantic Comedy SNAFU Climax!',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108489-UqIzSjJ4eOMD.png'
        },
        {
          name: 'Sword Art Online: Alicization - War of Underworld Part 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114308-8UBiS7U9buzu.jpg'
        }
      ],
      animeNext: [
        {
          name: 'Re:ZERO -Starting Life in Another World- Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108632-Z8LOaPpYPK93.jpg'
        },
        {
          name: 'The God of High School',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx116006-XasdW0bB4n18.png'
        },
        {
          name: 'Fire Force Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114236-lSQF4ljWQXdU.jpg'
        },
        {
          name: 'My Teen Romantic Comedy SNAFU Climax!',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108489-UqIzSjJ4eOMD.png'
        },
        {
          name: 'Sword Art Online: Alicization - War of Underworld Part 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114308-8UBiS7U9buzu.jpg'
        }
      ]
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
<style lang="scss" scoped>
h6 {
  color: #37394e;
  font-weight: bold;
}

.btn {
  color: white;
  background: #7289da;
  border-color: #7289da;
  line-height: 2em;
}
</style>
