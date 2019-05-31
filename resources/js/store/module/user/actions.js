import { getUser, activeUser } from '@/service/user'

export default {
    getUser({commit}, payload) {
        return new Promise((resolve, reject) => {
            getUser(payload.page).then(res => {
                commit('getUser', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },

    activeUser({commit}, payload) {
        return new Promise((resolve, reject) => {
            activeUser(payload.user_id).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
