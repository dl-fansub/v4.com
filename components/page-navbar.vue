<template>
  <section class="linear-header">
    <b-container>
      <b-navbar>
        <b-navbar-brand to="/">
          <img src="~/assets/logo_dlfs.png" class="d-inline-block align-top" width="360">
        </b-navbar-brand>
      </b-navbar>
      <div class="navbar-sign d-flex">
        <div>
          <fa icon="user-alt" />
          <b-form-input size="sm" placeholder="ชื่อสมาชิก" />
        </div>
        <div>
          <fa icon="key" />
          <b-form-input size="sm" type="password" placeholder="รหัสผ่าน" />
        </div>
      </div>
      <b-navbar class="navbar-top pb-0 d-flex justify-content-center">
        <b-navbar-nav class="w-100">
          <b-nav-item to="/" exact class="flex-fill p-1 px-0">
            <div class="icon px-2 d-flex justify-content-center">
              <fa icon="home" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">หน้าแรก</span>
              <span class="small">HOME</span>
            </div>
          </b-nav-item>
          <b-nav-item to="/anime" class="flex-fill p-1 px-0">
            <div class="icon px-2 d-flex justify-content-center">
              <fa icon="video" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">อนิเมะ</span>
              <span class="small">ANIME</span>
            </div>
          </b-nav-item>
          <b-nav-item to="/media" class="flex-fill p-1 px-0">
            <div class="icon px-2 d-flex justify-content-center">
              <fa icon="images" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">มีเดีย</span>
              <span class="small">MEDIA</span>
            </div>
          </b-nav-item>
          <b-nav-item to="/book" class="flex-fill p-1 px-0">
            <div class="icon px-2 d-flex justify-content-center">
              <fa icon="book" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">หนังสือ</span>
              <span class="small">BOOK</span>
            </div>
          </b-nav-item>
          <b-nav-item to="/webboard" class="flex-fill p-1 px-0">
            <div class="icon px-2 d-flex justify-content-center">
              <fa icon="comments" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">เว็บบอร์ด</span>
              <span class="small">WEBBOARD</span>
            </div>
          </b-nav-item>
          <b-nav-item to="/about" class="flex-fill p-1 px-0">
            <div class="icon px-2 d-flex justify-content-center">
              <fa icon="mug-hot" />
            </div>
            <div class="menu pt-1">
              <span class="name font-thai">เกี่ยวกับเรา</span>
              <span class="small">ABOUT US</span>
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
        color: #2297c2eb;
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
