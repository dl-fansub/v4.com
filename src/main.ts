import { createApp } from 'vue'
import { store, key } from './store'

import App from './App.vue'

import router from './router'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { BootstrapVue3 } from 'bootstrap-vue-3'

import './assets/scss/index.scss'
// Import Bootstrap

import './font-awesome.ts'
createApp(App).use(router).use(store, key).use(BootstrapVue3).component('fa', FontAwesomeIcon).mount('#app')
