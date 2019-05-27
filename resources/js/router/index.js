import Vue from 'vue'
import Router from 'vue-router'

import DefaultContainer from '@/containers/DefaultContainer'

import Dashboard from '@/views/Dashboard'

Vue.use(Router)

export default new Router({
    mode: 'history',
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
        {
            path: '/',
            redirect: '/dashboard',
            name: 'Home',
            component: DefaultContainer,
            children: [
                {
                    path: 'dashboard',
                    name: 'Dashboard',
                    component: Dashboard
                }
            ]
        }
    ]
})
