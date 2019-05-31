import { getCategory } from '@/service/category'

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
}
