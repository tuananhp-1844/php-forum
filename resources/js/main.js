// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import 'core-js/es6/promise'
import 'core-js/es6/string'
import 'core-js/es7/array'
// import cssVars from 'css-vars-ponyfill'
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './App'
import router from './router'
import VueI18n from 'vue-i18n'
import vnMessage from '@/langs/vi.json'
import enMessage from '@/langs/en.json'
import store from './store/index'
import Paginate from 'vuejs-paginate'

// todo
// cssVars()

Vue.use(BootstrapVue)
Vue.use(VueI18n)
Vue.component('paginate', Paginate)

const messages = {
    vn: vnMessage,
    en: enMessage,
}
const i18n = new VueI18n({
    locale: 'vn', // set locale
    messages,
    fallbackLocale: 'vn',
})

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    i18n,
    store,
    template: '<App/>',
    components: {
        App
    }
})
