import { getRole } from '@/service/role'

export default {
    getRole({commit}, payload) {
        return new Promise((resolve, reject) => {
            getRole(payload.page).then(res => {
                commit('getRole', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
}
