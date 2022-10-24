import { createRouter, createWebHistory, RouterView } from 'vue-router'
import Home from '../views/frontend/Home.vue'
import LoginOneId from '../views/admin/auth/LoginOneId'
import OneIdFrom from '../views/admin/auth/OneIdFrom'
import OneIdTo from '../views/admin/auth/OneIdTo'
import Index from '../views/admin/Index'

import i18n from '../i18n'

const routes = [
    {
        path: '/',
        redirect: `${i18n.global.locale}`,
    },
    {
        path: '/:lang',
        component: RouterView,
        children: [
            {
                path: '',
                name: 'Home',
                component: Home,
            },
            {
                path: 'login',
                name: 'LoginOneId',
                component: LoginOneId,
            },
            {
                path: 'oneIdFrom',
                name: 'OneIdFrom',
                component: OneIdFrom
            },
            {
                path: 'oneIdTo',
                name: 'OneIdTo',
                component: OneIdTo
            },
            {
                path: 'admin',
                name: 'Index',
                component: Index
            }
        ],
    }

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

router.beforeEach((to, from, next) => {
    i18n.global.locale = to.params.lang;
    next();
})

export default router
