import Vue from 'vue'

Vue.mixin({
  methods: {
    $domain (name) {
      if (!this.$auth || !this.$auth.user) { return false }
      const user = this.$auth.user.level > 0 || this.$auth.user.level < 3
      return (this.$auth.user.permission.find(e => e === name) && user) || this.$auth.user.level >= 3
    }
  }
})
