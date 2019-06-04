import { getDashboard } from '@/service/dashboard'
export default {
    getDashboard ({commit}, payload) {
        new Promise ((resolve, reject) => {
            getDashboard().then(res => {
                resolve(res)
                commit('getDashboard', res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
