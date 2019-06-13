import { getCategory, createCategory, destroyCategory, showCategory, updateCategory } from '@/service/category'

export default {
    getCategory({commit}, payload) {
        return new Promise((resolve, reject) => {
            getCategory(payload.page).then(res => {
                commit('getCategory', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },

    createCategory ({commit}, payload) {
        return new Promise((resolve, reject) => {
            createCategory(payload.category).then(res => {
                commit('createCategory', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },

    updateCategory ({commit}, payload) {
        return new Promise((resolve, reject) => {
            updateCategory(payload.category).then(res => {
                commit('updateCategory', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },

    destroyCategory ({commit}, payload) {
        return new Promise((resolve, reject) => {
            destroyCategory(payload.category).then(res => {
                commit('destroyCategory', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },

    showCategory ({commit}, payload) {
        return new Promise((resolve, reject) => {
            showCategory(payload.category).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
