<script lang="ts" setup>
import SectionHeader from '@/components/section/header.vue'
import SectionBottomMenu from '@/components/section/bottom-menu.vue'
import SectionFooter from '@/components/section/footer.vue'
</script>

<template>
  <div class="main-app">
    <SectionHeader />
    <section class="site-content py-3">
      <router-view />
    </section>
    <SectionBottomMenu class="bottom-menu" />
    <SectionFooter />
  </div>
</template>

<style lang="scss" scroped>
.main-app {
  height: 100vh;

  > .site-content {
    background-color: #fff;
    z-index: 1;
  }

  > .bottom-menu {
    background: #fff;
    z-index: 1;
  }

}
#app {
  font-family: 'Open Sans', Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
  color: #2c3e50;

  a.nav-text {
    color: #0865b2;
    padding: 1px 3px 1px 3px;
    border-radius: 3px;
    transition: all 0.2s ease-in-out;
    text-decoration: none;

    &:hover {
      color: #fff;
      background-color: #0865b2;
      text-decoration: none;
    }

    &.active {
      text-decoration: underline;
    }
  }

  .main-app {
    display: grid;
    width: 100%;
    height: 100vh;
    grid-template:
      "linear-header" auto
      "site-content" 1fr
      "bottom-menu" auto
      "linear-footer" 60px;
  }
}

</style>
