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
      <b-col lg="12" md="18">
        <b-row>
          <b-col class="anime-update">
            <div class="panel-header d-flex align-items-center border-bottom py-2 mb-2 px-1">
              <h6>อัพเดตอนิเมะตอนใหม่</h6>
              <b-button class="ml-auto" variant="none">
                <fa icon="ellipsis-v" />
              </b-button>
            </div>
            <a
              v-for="(e, i) in animeUpdate"
              :key="i"
              href="/root/anime/name/id"
              :class="`card-${e.color || 'default'}`"
              :style="{ '--media-text': 'hsl(22,76%,39%)' }"
            >
              <div class="pt-1">
                <b-avatar :size="26" variant="color" rounded="sm" :text="String(e.episode).padStart(2, '0')" />
              </div>
              <div class="pb-2 mb-1">
                <div class="d-block" v-text="e.name" />
                <div class="d-flex">
                  <b-badge variant="info" v-text="e.fansub" />
                  <b-badge v-if="e.type !== 'TV Show'" class="ml-1" variant="secondary" v-text="e.type" />
                </div>
              </div>
            </a>
          </b-col>
        </b-row>
        <b-row>
          <b-col class="manga-update">
            <div class="panel-header d-flex align-items-center border-bottom py-2 mb-2 px-1">
              <h6>อัพเดตมังงะตอนใหม่</h6>
              <b-button class="ml-auto" variant="none">
                <fa icon="ellipsis-v" />
              </b-button>
            </div>
          </b-col>
        </b-row>
      </b-col>
      <b-col lg="24" md="18">
        <h6 class="border-bottom p-2 px-1">
          อนิเมะซีซั่นถัดไป
        </h6>
        <b-row>
          <b-col>
            <a v-for="(e, i) in animeSeason" :key="i" :href="`/anime/story/${e.name}`" class="media-card">
              <div>
                <span v-text="e.title" />
                <span v-text="e.release" />
              </div>
              <div>
                <span v-text="e.type" />
                <span v-if="e.type !== 'Movie'" v-text="`${e.episode} episodes`" />
                <span v-else v-text="`${e.length}`" />
              </div>
            </a>
          </b-col>
        </b-row>
      </b-col>
    </b-row>
    <!-- <b-row class="mt-3">
      <b-col sm="24">
        <h6 class="border-bottom p-2 px-1">
          โฮโลไลฟ์
        </h6>
        <h6 class="border-bottom p-2 px-1">
          แฟนอาร์ท
        </h6>
      </b-col>
    </b-row> -->
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
      animeUpdate: [
        {
          name: 'The God of High School',
          episode: 9,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Yaoguai Mingdan ss2 (Monster List) ภาค2 ',
          episode: 14,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Monster Musume no Oisha-san รักษาหนูหน่อย คุณหมอมอนสเตอร์',
          episode: 8,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Shokugeki no Soma 2020 ยอดนักปรุงโซมะ ภาค6',
          episode: 9,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'One Piece วันพีช ซีซั่น 21 ดินแดนวาโนะ ตอนที่ 892-939 ซับไทย [ตอนใหม่ล่าสุด]',
          episode: 939,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Appare-Ranman! นักซิ่งแดนซามูไร',
          episode: 9,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Ahiru no Sora คนเล็กทะยานฟ้า',
          episode: 41,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Boruto Naruto Next Generations โบรูโตะ',
          episode: 163,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Peter Grill to Kenja no Jikan ปีเตอร์กริลกับปราชญ์แห่งกาลเวลา ตอนที่ 1-8 ซับไทย [Uncen] (ยังไม่จบ)',
          episode: 8,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Sword Art Online Alicization - War of Underworld 2',
          episode: 8,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Lapis Re Lights ไอดอลในโลกนี้ใช้เวทมนตร์ได้ด้วย',
          episode: 9,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Toaru Kagaku no Railgun T เรลกัน แฟ้มลับคดีวิทยาศาสตร์ ภาค3 ',
          episode: 21,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Maou Gakuin no Futekigousha ใครว่าข้าไม่เหมาะเป็นจอมมาร',
          episode: 9,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Kanojo Okarishimasu สะดุดรักยัยแฟนเช่า',
          episode: 8,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Enen no Shouboutai ss2 หน่วยผจญคนไฟลุก ภาค2',
          episode: 9,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Uzaki-chan wa Asobitai!',
          episode: 8,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Yahari Ore no Seishun Love Comedy wa Machigatteiru Kan ภาค3 ตอนที่ 1-8 ซับไทย (ยังไม่จบ)',
          episode: 8,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Deca-Dence ตอนที่ 1-8 ซับไทย (ยังไม่จบ)',
          episode: 8,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Fruits Basket (2019) ภาค2 ตอนที่ 1-21 ซับไทย (ยังไม่จบ)',
          episode: 21,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Houkago Teibou Nisshi ตอนที่ 1-8 ซับไทย (ยังไม่จบ)',
          episode: 8,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Re Zero S2 รีเซทชีวิต ฝ่าวิกฤตต่างโลก ภาค2',
          episode: 8,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Black Clover แบล็คโคลเวอร์',
          episode: 140,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Goblin Slayer: Goblin\'s Crown ก็อบลินสเลเยอร์ The Movie ซับไทย [จบแล้ว]',
          episode: 1,
          finish: true,
          fansub: 'DL-FS',
          type: 'Movie',
          encode: 'H.264'
        },
        {
          name: 'Goblin Slayer ก็อบลินสเลเยอร์ ตอนที่ 1-12 ซับไทย [จบแล้ว]+Sp10.5',
          episode: 12,
          finish: true,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Fugou Keiji Balance Unlimited คุณชายยอดนักสืบ ตอนที่ 1-6 ซับไทย (ยังไม่จบ)',
          episode: 6,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Strike the Blood IV OVA สายเลือดแท้ที่สี่ ภาค4 ตอนที่ 1-5 ซับไทย BD (ยังไม่จบ)',
          episode: 5,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Dokyuu Hentai HxEros ตอนที่ 1-6 ซับไทย (ยังไม่จบ)',
          episode: 6,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Boku no Tonari ni Ankoku Hakaishin ga Imasu ตอนที่ 1-7 ซับไทย [Raw 7-12 ตอนจบ]',
          episode: 7,
          finish: false,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Boku no Hero Academia the Movie 2 Heroes Rising วีรบุรุษกู้โลก เดอะมูฟวี่ (ซับไทย) [จบแล้ว]',
          episode: 1,
          finish: true,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Shokugeki no Soma 2019 ยอดนักปรุงโซมะ ภาค5 ตอนที่ 1-12 ซับไทย [จบแล้ว]',
          episode: 12,
          finish: true,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Shokugeki no Soma 2018 ยอดนักปรุงโซมะ ภาค4 ตอนที่ 1-12 ซับไทย [จบแล้ว]',
          episode: 12,
          finish: true,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        },
        {
          name: 'Shokugeki no Soma 2017 ยอดนักปรุงโซมะ ภาค3 ตอนที่ 1-12 ซับไทย [จบแล้ว]',
          episode: 12,
          finish: true,
          fansub: 'DL-FS',
          type: 'TV Show',
          encode: 'H.264'
        }
      ],
      animeSeason: [
        {
          title: 'Re:ZERO -Starting Life in Another World- Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108632-Z8LOaPpYPK93.jpg',
          type: 'TV Show',
          release: 'Spring 2020',
          episode: 12
        },
        {
          title: 'The God of High School',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx116006-XasdW0bB4n18.png',
          type: 'TV Show',
          release: 'Spring 2020',
          episode: 51
        },
        {
          title: 'Fire Force Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114236-lSQF4ljWQXdU.jpg',
          type: 'TV Show',
          release: 'Spring 2020',
          episode: 64
        },
        {
          title: 'My Teen Romantic Comedy SNAFU Climax!',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108489-UqIzSjJ4eOMD.png',
          type: 'OVA',
          release: 'Spring 2020',
          episode: 3
        },
        {
          title: 'Sword Art Online: Alicization - War of Underworld Part 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114308-8UBiS7U9buzu.jpg',
          type: 'TV Show',
          release: 'Spring 2020',
          episode: 8
        },
        {
          title: 'Re:ZERO -Starting Life in Another World- Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108632-Z8LOaPpYPK93.jpg',
          type: 'TV Show',
          release: 'Spring 2020',
          episode: 12
        },
        {
          title: 'The God of High School',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx116006-XasdW0bB4n18.png',
          type: 'TV Show',
          release: 'Spring 2020',
          episode: 7
        },
        {
          title: 'Fire Force Season 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114236-lSQF4ljWQXdU.jpg',
          type: 'TV Show',
          release: 'Spring 2020',
          episode: 4
        },
        {
          title: 'My Teen Romantic Comedy SNAFU Climax!',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx108489-UqIzSjJ4eOMD.png',
          type: 'TV Show',
          release: 'Spring 2020',
          episode: 12
        },
        {
          title: 'Sword Art Online: Alicization - War of Underworld Part 2',
          cover: 'https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx114308-8UBiS7U9buzu.jpg',
          type: 'Movie',
          release: 'Spring 2020',
          episode: 1,
          length: '2 hours, 10 mins'
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
.panel-header {
  h6 {
    color: #37394e;
    font-weight: bold;
    margin: 0;
  }

  svg {
    font-size: 0.95rem;
    color: #37394e;
  }

  .btn-none {
    padding: 0 6px;
  }
}

.discord-page {
  .btn {
    color: white;
    background: #7289da;
    border-color: #7289da;
    line-height: 2em;
  }
}

.anime-update {
  > a {
    color: #37394e;
    text-decoration: none;
    font-weight: bold;
    display: grid;
    grid-template-columns: 26px 1fr;
    grid-gap: 10px;
    margin-bottom: 5px;

    &.card-default:hover {
      color: var(--media-text);

      .b-avatar {
        color: #fff;
        background-color: var(--media-text);
        transition: none;
      }
    }

    .badge-color {
      background-color: #e8e7e7;
    }

    > div {
      font-size: 0.8rem;
    }
  }
}

.anime-next {
  grid-gap: 15px 15px;
  display: grid;
  grid-template-columns: repeat(auto-fill, 150px);
  justify-content: space-between;

  // .media-card {
  //   animation: all 0.3s linear;
  //   display: grid;
  //   grid-template-rows: min-content auto;
  //   position: relative;
  //   width: 150px;

  //   .title {
  //     color: rgb(116, 136, 153);
  //     font-size: 0.9rem;
  //     font-weight: bold;
  //     margin-top: 10px;
  //     overflow: hidden;
  //     transition: color 0.2s ease;
  //     display: -webkit-box;
  //     -webkit-box-orient: vertical;
  //     -webkit-line-clamp: 2;
  //   }

  //   .cover {
  //     background: rgba(221, 230, 238, 0.8);
  //     border-radius: 4px;
  //     box-shadow:
  //       0 14px 30px rgba(103, 132, 187, 0.15),
  //       0 4px 4px rgba(103, 132, 187, 0.05);
  //     cursor: pointer;
  //     display: inline-block;
  //     height: 215px;
  //     overflow: hidden;
  //     position: relative;
  //     width: 100%;
  //     z-index: 5;

  //     img {
  //       height: 100%;
  //       left: 0;
  //       object-fit: cover;
  //       position: absolute;
  //       top: 0;
  //       transition: opacity 0.3s ease-in-out;
  //       width: 100%;
  //     }
  //   }
  // }
}

</style>
