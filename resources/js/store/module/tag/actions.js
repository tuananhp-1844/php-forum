import { getTag, createTag, updateTag, destroyTag, showTag} from '@/service/tag'

export default {
    getTag({commit}, payload) {
        return new Promise((resolve, reject) => {
            getTag(payload.page).then(res => {
                commit('getTag', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    createTag ({commit}, payload) {
        return new Promise((resolve, reject) => {
            createTag(payload.tag).then(res => {
                commit('createTag', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },

    updateTag ({commit}, payload) {
        return new Promise((resolve, reject) => {
            updateTag(payload.tag).then(res => {
                commit('updateTag', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },

    destroyTag ({commit}, payload) {
        return new Promise((resolve, reject) => {
            destroyTag(payload.tag).then(res => {
                commit('destroyTag', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },

    showTag ({commit}, payload) {
        return new Promise((resolve, reject) => {
            showTag(payload.tag).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
