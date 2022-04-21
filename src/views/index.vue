
<script lang="ts" setup>
import { AnimeUpdated } from './index';

let sliding = null

let animeUpdate: AnimeUpdated[] = [
  {
    name: 'Tate no Yuusha no Nariagari',
    season: 'Season 2',
    fansub: 'Unknow',
    episode: 3,
    type: 'TV'
  }
]

let animeSeason: {}[] = [
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

const metaNoImage = () => {
  return '/carousel/noimage.png'
}

// const metaNoImage = () => {
//   return new URL('./carousel/noimage.png', import.meta.url).href
// }

const onSlideStart = () => {
  sliding = true
}
const onSlideEnd = () => {
  sliding = false
}

let items = [
  { text: 'หน้าหลัก', active: true }
]

let slideSouce = [
  { src: '', caption: null, text: 'A' },
  { src: null, caption: null, text: 'B' },
  { src: null, caption: null, text: 'C' },
  { src: null, caption: null, text: 'D' },
  { src: null, caption: null, text: 'E' },
  { src: null, caption: null, text: 'F' },
  { src: null, caption: null, text: 'G' },
  { src: null, caption: null, text: 'H' }
]
</script>

<template>
  <b-container>
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
              <b-button class="ms-auto" variant="none">
                <fa icon="ellipsis-v" />
              </b-button>
            </div>
            <a
              v-for="(e, i) in animeUpdate"
              :key="i"
              href="/root/anime/name/id"
              :class="`card-${e.color || 'default'}`"
            >
              <div class="pt-1">
                <div class="episode" :text="String(e.episode).padStart(2, '0')" />
              </div>
              <div class="pb-2 mb-1">
                <div class="d-block" v-text="`${e.name}${e.season ? ` - ${e.season}` : ''}`" />
                <div class="d-flex">
                  <b-badge variant="info" v-text="e.fansub" />
                  <b-badge v-if="e.type !== 'TV Show'" class="ms-1" variant="secondary" v-text="e.type" />
                </div>
              </div>
            </a>
          </b-col>
        </b-row>
        <b-row>
          <b-col class="manga-update">
            <div class="panel-header d-flex align-items-center border-bottom py-2 mb-2 px-1">
              <h6>อัพเดตมังงะตอนใหม่</h6>
              <b-button class="ms-auto" variant="none">
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
            <!-- <a v-for="(e, i) in animeSeason" :key="i" :href="`/anime/story/${e.name}`" class="media-card">
              <div>
                <span v-text="e.title" />
                <span v-text="e.release" />
              </div>
              <div>
                <span v-text="e.type" />
                <span v-if="e.type !== 'Movie'" v-text="`${e.episode} episodes`" />
                <span v-else v-text="`${e.length}`" />
              </div>
            </a> -->
          </b-col>
        </b-row>
      </b-col>
    </b-row>
    <b-row class="mt-3">
      <b-col sm="24">
        <!-- <h6 class="border-bottom p-2 px-1">
          โฮโลไลฟ์
        </h6> -->
        <h6 class="border-bottom p-2 px-1">
          แฟนอาร์ท
        </h6>
      </b-col>
    </b-row>
  </b-container>
</template>

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
    grid-template-columns: 32px 1fr;
    grid-gap: 10px;
    margin-bottom: 5px;

    .episode {
      border: #ababab 1px solid;
      border-radius: 3px;
      height: 32px;
      width: 32px;
    }
    &.card-default:hover {
      color: var(--media-text);

      .episode {
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
