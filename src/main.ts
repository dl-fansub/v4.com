import { createApp } from 'vue'
import { store, key } from './store'

import App from './App.vue'

import router from './router'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import './assets/scss/index.scss'
// Import Bootstrap

import './font-awesome.ts'

createApp(App).use(router).use(store, key).component('fa', FontAwesomeIcon).mount('#app')