import { createRouter, createWebHashHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'price.index',
    component: () => import('@/views/PriceIndexView.vue')
  },

  {
    path: '/store',
    name: 'price.store',
    component: () => import('@/views/PriceStoreView.vue')
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
