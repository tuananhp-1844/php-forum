import { getBackup } from '@/service/backup'

export default {
    getBackup({commit}, payload) {
        return new Promise((resolve, reject) => {
            getBackup(payload.page).then(res => {
                commit('getBackup', res)
                resolve(res)
            }).catch(error => {
                reject(error)
            })
        })
    }
}
