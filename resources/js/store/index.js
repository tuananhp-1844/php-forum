import Vue from 'vue'
import Vuex from 'vuex'
import Profile from '@/store/module/profile'
import User from '@/store/module/user'
import Tag from '@/store/module/tag'
import Category from '@/store/module/category'
import Question from '@/store/module/question'
import Post from '@/store/module/post'
import Dashboard from '@/store/module/dashboard'
import Role from '@/store/module/role'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        Profile,
        User,
        Tag,
        Category,
        Question,
        Post,
        Dashboard,
        Role
    }
})
