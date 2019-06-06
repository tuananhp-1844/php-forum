import Vue from 'vue'
import Router from 'vue-router'

import DefaultContainer from '@/containers/DefaultContainer'

import Dashboard from '@/views/dashboard'

import User from '@/views/user'

import Tag from '@/views/tag'

import Category from '@/views/category'

import Question from '@/views/question'

import Post from '@/views/post'

import Role from '@/views/role'

import Backup from '@/views/backup'

import Login from '@/views/pages/Login'

import { checkToken, checkExpires } from '@/helper/local-storage'

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
                },
                {
                    path: 'question',
                    name: 'Question',
                    component: Question
                },
                {
                    path: 'post',
                    name: 'Post',
                    component: Post
                },
                {
                    path: 'role',
                    name: 'Role',
                    component: Role
                },
                {
                    path: 'backup/database',
                    name: 'Backup',
                    component: Backup
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
        if (!checkToken() || !checkExpires()) {
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
