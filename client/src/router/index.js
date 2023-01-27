import { createRouter, createWebHistory } from 'vue-router'

import Login from '../pages/Login.vue'
import ProductsList from '../pages/products/list.vue'
import ShowCart from '../pages/cart/showCart.vue'
import CallBack from '../pages/cart/CallBack.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    
    {
      path: '/products',
      name: 'productList',
      component: ProductsList,
    },

    {
      path: '/cart',
      name: 'showCart',
      component: ShowCart,
    },
    {
      path: '/call-back',
      name: 'callBack',
      component: CallBack,
    },

    {path: '/:pathMatch(.*)*', name: 'NotFound',  component: () => import('../pages/NotFound.vue')  }
  ]
})

export default router
