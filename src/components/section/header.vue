<script lang="ts" setup>
let menuItem: {
  route: String,
  icon: String,
  th: String,
  en: String
}[] = [
  { th: 'หน้าแรก', en: 'home', route: '/', icon: 'home' },
  { th: 'อนิเมะ', en: 'anime', route: '/anime', icon: 'video' },
  { th: 'มีเดีย', en: 'illustrations', route: '/media', icon: 'image' },
  { th: 'หนังสือ', en: 'manga & novel', route: '/book', icon: 'book' },
  { th: 'เว็บบอร์ด', en: 'webboard', route: '/board', icon: 'comment' },
  { th: 'เกี่ยวกับเรา', en: 'about us', route: '/about', icon: 'mug-hot' }
]
</script>

<template>
  <section class="linear-header">
    <b-container>
      <nav class="navbar">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logo_dlfs.png" class="d-inline-block align-top" width="360">
        </a>
      </nav>
      <form name="sign-in" class="navbar-sign d-block ms-5">
        <div class="sign-register d-flex ms-1 align-items-center">
          <b-button size="sm" variant="primary" class="font-thai btn-discord ms-1">
            <fa :icon="['fab','discord']" /> เข้าใช้งานระบบ
          </b-button>
        </div>
      </form>
      <nav class="navbar navbar-expand navbar-top px-1 pb-0 d-none d-md-flex justify-content-center">
        <ul class="navbar-nav w-100">
          <li v-for="(e, i) in menuItem" :key="i" class="nav-item flex-fill p-1 px-0">
            <router-link :to="e.route" :exact="i == 0" class="nav-link">
              <div class="icon px-2 d-flex justify-content-center">
                <fa class="d-md-none d-lg-block" :icon="e.icon" />
              </div>
              <div class="menu pt-1">
                <span class="name font-thai" v-text="e.th" />
                <span class="small" v-text="e.en" />
              </div>
            </router-link>
          </li>
        </ul>
      </nav>
    </b-container>
  </section>
</template>

<style lang="scss" scoped>
@function gradient($deg: 90deg) {
  @return linear-gradient(
    $deg,
    rgba(88, 86, 86, 0) 20%,
    rgba(255, 255, 255, 1) 100%
  );
}

.sign-register {
  font-size: 0.8rem;

  button {
    line-height: 1rem;

    &.btn-facebook {
      padding: 4px 3px 0 3px;
      background: #3a5a97;
      border-color: #3a5a97;
      color: #fff;

      &:disabled {
        background-color: #6c757d;
        border-color: #6c757d;
      }
    }

    &.btn-discord {
      padding: 4px 4px 0 4px;
      color: white;
      background: #7289da;
      border-color: #7289da;
    }
  }
}

.navbar-sign {
  min-height: 4.55em;

  div {
    > .svg-inline--fa {
      position: absolute;
      margin: 0.47em 0 0 0.5em;
      font-size: 0.87rem;
      color: #00569b;
    }

    > .form-control {
      padding-left: 2.2em;
      font-size: 0.7rem;
    }
  }

  .submit > button {
    padding: 4px 9px 0 9px;
  }
}

.navbar {
  .navbar-nav {
    border-radius: 6px 6px 0 0;
    box-shadow: 0 -2px 6px 0 rgba(97, 97, 97, 1);
  }

  .nav-item {
    background-color: #0f0f0f;

    &:first-child {
      border-radius: 6px 0 0 0;
    }

    &:last-child {
      border-radius: 0 6px 0 0;
    }

    a.nav-link {
      display: flex;
      flex-direction: row;
      color: #ffffffd4;
      border: solid 1px transparent;
      border-radius: 4px;
      transition: all 0.2s ease;
      // background:
      //   linear-gradient(
      //     180deg,
      //     #0186c500 0%,
      //     #0961af00 100%
      //   );

      &:hover {
        color: #0186c5eb;
      }

      &.active {
        transform: translate(0, -10px);
        border: solid 1px #05469f;
        box-shadow: inset 0 0 2px 0 rgba(1, 132, 192, 1);
        background:
          linear-gradient(
            180deg,
            #0186c5 0%,
            #0961af 100%
          );
        background-color: #0961af;

        &::after {
          content: ' ';
          width: 0;
          height: 0;
          border-style: solid;
          border-width: 9px 5px 0 5px;
          border-color: #0961af transparent transparent transparent;
          position: absolute;
          bottom: -9px;
          transform: translate(-11px);
          margin-left: 50%;
        }

        &:hover {
          color: #ffffffd4;
        }
      }

      > div.icon {
        font-size: 1.3rem;
        flex: 2;
      }

      > div.menu {
        display: grid;
        flex-direction: column;
        min-width: 4em;
        flex: 5;

        .name {
          font-size: 1rem;
          font-weight: bold;
          line-height: 0.8rem;
        }

        .small {
          font-family: 'Segoe UI', Geneva, Verdana, sans-serif;
          text-transform: uppercase;
          font-size: 0.5rem;
          opacity: 0.6;
        }
      }
    }
  }
}

.linear-header {
  background-image: url('../../assets/header/default.jpg');
  background-position: center top;
  background-repeat: no-repeat;

  // &::before {
  //   top: 0;
  //   left: 0;
  //   position: absolute;
  //   width: 10vw;
  //   height: 100vh;
  //   content: " ";
  //   background: rgb(255, 255, 255);
  //   background: gradient(270deg);
  // }

  // &::after {
  //   top: 0;
  //   right: 0;
  //   position: absolute;
  //   width: 10vw;
  //   height: 100vh;
  //   content: " ";
  //   background: rgb(255, 255, 255);
  //   background: gradient(90deg);
  // }
}
</style>
