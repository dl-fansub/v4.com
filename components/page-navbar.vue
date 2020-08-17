<template>
  <section class="linear-header">
    <b-container>
      <b-navbar>
        <b-navbar-brand to="/">
          <img src="~/assets/logo_dlfs.png" class="d-inline-block align-top" width="360">
        </b-navbar-brand>
      </b-navbar>

      <b-navbar class="navbar-top">
        <b-navbar-nav>
          <b-nav-item to="/" exact class="p-1 px-2">
            <div class="icon px-2">
              <fa icon="home" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">หน้าแรก</span>
              <span class="small">HOME</span>
            </div>
          </b-nav-item>
          <b-nav-item to="/anime" class="p-1 px-2">
            <div class="icon px-2">
              <fa icon="video" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">อนิเมะ</span>
              <span class="small">ANIME</span>
            </div>
          </b-nav-item>
          <b-nav-item to="/media" class="p-1 px-2">
            <div class="icon px-2">
              <fa icon="images" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">มีเดีย</span>
              <span class="small">MEDIA</span>
            </div>
          </b-nav-item>
          <b-nav-item to="/book" class="p-1 px-2">
            <div class="icon px-2">
              <fa icon="book" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">หนังสือ</span>
              <span class="small">BOOK</span>
            </div>
          </b-nav-item>
          <b-nav-item to="/webboard" class="p-1 px-2">
            <div class="icon px-2">
              <fa icon="comments" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">เว็บบอร์ด</span>
              <span class="small">WEBBOARD</span>
            </div>
          </b-nav-item>
        </b-navbar-nav>
      </b-navbar>
    </b-container>
  </section>
</template>

<style lang="scss" scoped>
@function gradient($deg: 90deg) {
  @return linear-gradient(
    $deg,
    rgba(255, 255, 255, 0) 20%,
    rgba(255, 255, 255, 1) 100%
  );
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

      &:hover {
        color: #2297c2eb;
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
          font-size: 0.5rem;
          opacity: 0.6;
        }
      }
    }
  }
}

.linear-header {
  background-image: url("/header-bg/default.jpg");
  background-position: center top;
  background-repeat: no-repeat;

  &::before {
    top: 0;
    left: 0;
    position: absolute;
    width: 10vw;
    height: 100vh;
    content: " ";
    background: rgb(255, 255, 255);
    background: gradient(270deg);
  }

  &::after {
    top: 0;
    right: 0;
    position: absolute;
    width: 10vw;
    height: 100vh;
    content: " ";
    background: rgb(255, 255, 255);
    background: gradient(90deg);
  }
}
</style>
