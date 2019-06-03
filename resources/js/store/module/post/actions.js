import { getPost, changeStatus } from '@/service/post'

export default {
    getPost({commit}, payload) {
        return new Promise((resolve, reject) => {
            getPost(payload.page).then(res => {
                commit('getPost', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },

    changeStatus({commit}, payload) {
        return new Promise((resolve, reject) => {
            changeStatus(payload.status, payload.post_id).then(res => {
                commit('changeStatus', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
