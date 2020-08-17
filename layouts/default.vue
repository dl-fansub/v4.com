<template>
  <div class="main-app d-flex flex-column align-items-stretch">
    <page-navbar />
    <Nuxt />
    <page-detail />
  </div>
</template>
<script>
import pageNavbar from '~/components/page-navbar'
import pageDetail from '~/components/page-detail'

export default {
  components: {
    pageNavbar,
    pageDetail
  }
}
</script>
<style scroped>
.main-app {
  height: 100vh;
}
</style>
