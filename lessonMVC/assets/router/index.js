import { createRouter, createWebHistory } from 'vue-router'


const routes = [
    {
        path: '/cakes',
        component: () => import('../views/Cakes.vue')
    },
    {
        path: '/cakes/:id',
        component: () => import('../views/Cake.vue')
    },
    {
        path: '/addCake',
        component: () => import('../views/AddCake.vue')
    },
    {
        path: '/findCakes',
        component: () => import('../views/FindCakes.vue')
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router