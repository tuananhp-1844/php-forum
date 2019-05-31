import Vue from 'vue'
import Router from 'vue-router'

import DefaultContainer from '@/containers/DefaultContainer'

import Dashboard from '@/views/Dashboard'

import User from '@/views/user'

<<<<<<< df9cd6e7c46d3428ff42d1184ec615cf4d338ba3
import Tag from '@/views/tag'

import Category from '@/views/category'

=======
>>>>>>> 12675_users crud
import Login from '@/views/pages/Login'

import { checkToken } from '@/helper/local-storage'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
        {
            path: '/',
            redirect: '/dashboard',
            name: 'Home',
            component: DefaultContainer,
            meta: { requiresAuth: true },
            children: [
                {
                    path: 'dashboard',
                    name: 'Dashboard',
                    component: Dashboard
                },
                {
                    path: 'user',
                    name: 'User',
                    component: User
<<<<<<< df9cd6e7c46d3428ff42d1184ec615cf4d338ba3
                },
                {
                    path: 'tag',
                    name: 'Tag',
                    component: Tag
                },
                {
                    path: 'category',
                    name: 'Category',
                    component: Category
=======
>>>>>>> 12675_users crud
                }
            ]
        },
        {
            path: '/login',
            name: 'Login',
            component: Login,
        }
    ]
})
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        console.log(checkToken());
        if (!checkToken()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next()
    }
})

export default router;
