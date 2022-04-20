<template>
  <section>
    <b-container>
      <div class="footer">
        <b-row class="px-3">
          <b-col class="d-flex align-items-center" sm="12" md="8" lg="6">
            <div class="flex-icon flex-fill border-right">
              เกี่ยวกับเรา
            </div>
          </b-col>
          <b-col class="d-flex align-items-center" sm="24" md="28" lg="30">
            <div class="flex-span">
              <router-link class="nav-text" to="/about/donate">
                บริจาคสนับสนุน
              </router-link>
            </div>
            <div class="flex-span">
              <router-link class="nav-text" to="/about/team">
                ทีมงาน dl-fs
              </router-link>
            </div>
            <div class="flex-span">
              <router-link class="nav-text" to="/about/join">
                ร่วมงานกับเรา
              </router-link>
            </div>
          </b-col>
        </b-row>
        <b-row class="px-3">
          <b-col class="d-flex align-items-center" sm="12" md="8" lg="6">
            <div class="flex-icon flex-fill border-right">
              เกี่ยวกับเว็บไซต์นี้
            </div>
          </b-col>
          <b-col class="d-flex align-items-center" sm="24" md="28" lg="30">
            <div class="flex-span">
              <router-link class="nav-text" to="/about/terms">
                เงื่อนไขการใช้งานเว็บไซต์
              </router-link>
            </div>
            <div class="flex-span">
              <router-link class="nav-text" to="/about/fansubs">
                นโยบายของแฟนซับ
              </router-link>
            </div>
          </b-col>
        </b-row>
        <b-row class="px-3">
          <b-col class="d-flex align-items-center" sm="12" md="8" lg="6">
            <div class="flex-icon flex-fill border-right">
              เว็บไซต์แฟนซัพ
            </div>
          </b-col>
          <b-col class="d-flex align-items-center flex-wrap" sm="24" md="28" lg="30">
            <a
              v-for="({ name, banner, url, disabled, }, i) in fansubs"
              :key="i"
              target="_blank"
              class="nav-img"
              :class="{ disabled }"
              :href="url"
              v-text="name"
            />
          </b-col>
        </b-row>
      </div>
      <div class="notice mt-3 p-2 px-3 font-thai text-center" v-text="notice || '&nbsp;'" />
      <div class="to-top font-thai text-right mt-4 mb-2 d-flex justify-content-end">
        <a href="#" @click.prevent="scrollToTop">
          <span>กลับขึ้นไปด้านบน</span>
          <span class="button">
            <svg width="6" height="4" viewBox="0 0 3 2">
              <path style="fill: white;" d="M0,1H1V2H0V1ZM1,0H2V1H1V0ZM2,1H3V2H2V1Z" />
            </svg>
          </span>
        </a>
      </div>
    </b-container>
  </section>
</template>
<script lang="ts" setup>
let notice: string = ''
let fansubs: { name: string, banner?: string, url: string, disabled: boolean }[] = [
  { name: 'Tirkx', url: 'https://www.facebook.com/Tirkx/', disabled: false },
  { name: 'DL-FS', url: 'https://www.facebook.com/DL.Fansub/', disabled: false }
]

const scrollToTop = () => window.scrollTo(0,0)

</script>

<style lang="scss" scoped>
.to-top {
  a {
    font-size: 0.95rem;
    font-weight: bold;
    line-height: 1.1rem;
    text-decoration: none;
    color: black;

    span.button {
      display: inline-block;
      width: 2.5em;
      height: 1em;
      border: none;
      background-color: #000;
      text-align: center;
    }

    &:hover {
      color: #0961af;

      span.button {
        background-color: #0961af;
      }
    }
  }
}

.notice {
  color: #fff;
  background: linear-gradient(180deg, #0186c5 0%, #0961af 100%);
  background-color: #0961af;
  font-size: 1rem;
  line-height: 1.1rem;
}

.footer {
  background-color: #fff;
  border-top: #e9ecef solid 3px;
  border-bottom: #e9ecef solid 3px;
  font-size: 0.75rem;
  color: #333;

  .nav-img {
    background-size: cover;
    width: 48px;
    height: 18px;
    margin: 2px;
    padding: 0;
    border: #fff solid 1px;
    outline: #dcdcdc solid 1px;
    text-decoration: none;
    overflow: hidden;
    font-size: 0.65rem;
    text-align: center;
    cursor: pointer;
    color: #607d8b;
    vertical-align: middle;
    line-height: 1rem;

    &:hover {
      color: #0961af;
      outline: #0961af solid 1px;
    }

    &.disabled {
      cursor: default;
      outline: #dcdcdc solid 1px;
      filter: grayscale(100%);
      opacity: 0.5;
    }
  }

  .row {
    > div.d-flex {
      font-weight: bold;
      vertical-align: middle;
      border-bottom: #dee2e6 dotted 1px;
      padding: 0.35rem;

      &:nth-child(1) {
        padding-left: 1rem;
      }

      > .flex-icon {
        background-image: url('../../assets/arrow_support.png');
        background-repeat: no-repeat;
        background-position: 0.2em;
        padding-left: 1.5em;
      }

      .flex-span {
        padding: 0 0.7em;
        margin-top: 0.1em;
        border-left: #dee2e6 solid 1px;

        &:first-child {
          border-left: none;
          padding-left: 0;
        }
      }
    }

    &:last-child {
      > div {
        border-bottom: none;
      }
    }
  }
}
</style>
