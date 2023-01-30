import { createRouter, createWebHashHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'price.index',
    component: () => import('@/views/PriceIndexView.vue')
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
