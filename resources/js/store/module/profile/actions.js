import { getProfile } from '@/service/profile'

export default {
    getProfile ({commit}, payload) {
        new Promise ((resolve, reject) => {
            getProfile().then(res => {
                resolve(res)
                commit('getProfile', res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
