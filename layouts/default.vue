<template>
  <div class="main-app d-flex flex-column align-items-stretch">
    <section-header />
    <section class="site-content py-3">
      <nuxt />
    </section>
    <section-bottom-menu />
    <section-footer />
  </div>
</template>
<script>
import sectionHeader from '~/components/section-header'
import sectionFooter from '~/components/section-footer'
import sectionBottomMenu from '~/components/section-bottom-menu'

export default {
  components: {
    sectionHeader,
    sectionFooter,
    sectionBottomMenu
  }
}
</script>
<style lang="scss" scroped>
.main-app {
  height: 100vh;

  > .site-content {
    background-color: #fff;
    z-index: 1;
  }
}
</style>
