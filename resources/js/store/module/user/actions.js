import { getUser } from '@/service/user'

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
    }
}
