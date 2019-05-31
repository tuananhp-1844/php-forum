import Vue from 'vue'
import Vuex from 'vuex'
import Profile from '@/store/module/profile'
import User from '@/store/module/user'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        Profile,
        User
    }
})
