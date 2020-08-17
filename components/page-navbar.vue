<template>
  <section class="linear-header">
    <b-container>
      <b-navbar>
        <b-navbar-brand href="#">
          <img src="~/assets/logo_dlfs.png" class="d-inline-block align-top" alt="Kitten">
        </b-navbar-brand>
      </b-navbar>

      <b-navbar class="navbar-top">
        <b-navbar-nav>
          <b-nav-item href="#">
            <span class="name font-thai">หน้าแรก</span>
            <span class="small">HOME</span>
          </b-nav-item>
          <b-nav-item href="#">
            <span class="name font-thai">อนิเมะ</span>
            <span class="small">ANIME</span>
          </b-nav-item>
          <b-nav-item href="#">
            <span class="name font-thai">มีเดีย</span>
            <span class="small">MEDIA</span>
          </b-nav-item>
          <b-nav-item href="#">
            <span class="name font-thai">หนังสือ</span>
            <span class="small">BOOK</span>
          </b-nav-item>
          <b-nav-item href="#">
            <span class="name font-thai">เว็บบอร์ด</span>
            <span class="small">WEBBOARD</span>
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
  .nav-item {
    background-color: #0f0f0f;

    a.nav-link {
      display: grid;
      color: #ffffffd4;
    }

    a.nav-link:hover {
      color: #2297c2eb;
    }
  }

  .name {
    font-size: 1rem;
    font-weight: bold;
    line-height: 0.8rem;
  }

  .small {
    font-family: 'Tahoma', Geneva, Verdana, sans-serif;
    font-size: 0.5rem;
  }
}

.linear-header {
  background: url('/header-bg/default.jpg');

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
