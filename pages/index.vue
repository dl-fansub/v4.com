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
    </b-row>
    <b-row>
      <b-col sm="12">
        <h6 class="border-bottom p-2 px-1">
          อนิเมะซีซั่นนี้
        </h6>
      </b-col>
      <b-col sm="24">
        <h6 class="border-bottom p-2 px-1">
          ซีซั่นที่กำลังจะฉาย
        </h6>
        <b-row>
          <b-col class="anime-next">
            <div v-for="(e, i) in animeNext" :key="i" class="media-card">
              <a href="/" class="cover">
                <img :src="e.cover">
              </a>
              <a href="/" class="title" v-text="e.title" />
            </div>
          </b-col>
        </b-row>
      </b-col>
    </b-row>
    <b-row class="mt-3">
      <b-col sm="12">
        <h6 class="border-bottom p-2 px-1">
          มังงะซีขั่นนี้
        </h6>
      </b-col>
      <b-col sm="24">
        <h6 class="border-bottom p-2 px-1">
          โฮโลไลฟ์
        </h6>
        <h6 class="border-bottom p-2 px-1">
          แฟนอาร์ท
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
          title: 'Re:ZERO -Starting Life in Another World- Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108632-Z8LOaPpYPK93.jpg'
        },
        {
          title: 'The God of High School',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx116006-XasdW0bB4n18.png'
        },
        {
          title: 'Fire Force Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114236-lSQF4ljWQXdU.jpg'
        },
        {
          title: 'My Teen Romantic Comedy SNAFU Climax!',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108489-UqIzSjJ4eOMD.png'
        },
        {
          title: 'Sword Art Online: Alicization - War of Underworld Part 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114308-8UBiS7U9buzu.jpg'
        }
      ],
      animeNext: [
        {
          title: 'Re:ZERO -Starting Life in Another World- Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108632-Z8LOaPpYPK93.jpg'
        },
        {
          title: 'The God of High School',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx116006-XasdW0bB4n18.png'
        },
        {
          title: 'Fire Force Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114236-lSQF4ljWQXdU.jpg'
        },
        {
          title: 'My Teen Romantic Comedy SNAFU Climax!',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108489-UqIzSjJ4eOMD.png'
        },
        {
          title: 'Sword Art Online: Alicization - War of Underworld Part 2',
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

.anime-next {
  grid-gap: 15px 15px;
  display: grid;
  grid-template-columns: repeat(auto-fill, 150px);
  justify-content: space-between;

  .media-card {
    animation: all 0.3s linear;
    display: grid;
    grid-template-rows: min-content auto;
    position: relative;
    width: 150px;

    .title {
      color: rgb(116, 136, 153);
      font-size: 0.9rem;
      font-weight: bold;
      margin-top: 10px;
      overflow: hidden;
      transition: color 0.2s ease;
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-line-clamp: 2;
    }

    .cover {
      background: rgba(221, 230, 238, 0.8);
      border-radius: 4px;
      box-shadow:
        0 14px 30px rgba(103, 132, 187, 0.15),
        0 4px 4px rgba(103, 132, 187, 0.05);
      cursor: pointer;
      display: inline-block;
      height: 215px;
      overflow: hidden;
      position: relative;
      width: 100%;
      z-index: 5;

      img {
        height: 100%;
        left: 0;
        object-fit: cover;
        position: absolute;
        top: 0;
        transition: opacity 0.3s ease-in-out;
        width: 100%;
      }
    }
  }
}

</style>
