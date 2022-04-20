import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'index',
    component: () => import('../views/index.vue')
  },
  {
    path: '/anime',
    name: 'anime',
    component: () => import('../views/anime.vue')
  },
  {
    path: '/media',
    name: 'media',
    component: () => import('../views/media.vue')
  },
  {
    path: '/book',
    name: 'book',
    component: () => import('../views/book.vue')
  },
  {
    path: '/board',
    name: 'board',
    component: () => import('../views/board.vue')
  },
  {
    path: '/about',
    name: 'about',
    component: () => import('../views/about/index.vue')
  },
  {
    path: '/about/donate',
    name: 'about-donate',
    component: () => import('../views/about/donate.vue')
  },
  {
    path: '/about/team',
    name: 'about-team',
    component: () => import('../views/about/team.vue')
  },
  {
    path: '/about/join',
    name: 'about-join',
    component: () => import('../views/about/join.vue')
  },
  {
    path: '/about/terms',
    name: 'about-terms',
    component: () => import('../views/about/terms.vue')
  },
  {
    path: '/about/fansubs',
    name: 'about-fansubs',
    component: () => import('../views/about/fansubs.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  linkActiveClass: 'active',
  linkExactActiveClass: 'active-exact'
})

export default router
