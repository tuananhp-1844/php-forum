import Vue from 'vue'
import Vuex from 'vuex'
import Profile from '@/store/module/profile'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        Profile
    }
})
