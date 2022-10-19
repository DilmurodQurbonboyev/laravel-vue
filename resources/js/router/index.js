import { createRouter, createWebHistory, RouterView } from 'vue-router'

const routes = [];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})


export default router
