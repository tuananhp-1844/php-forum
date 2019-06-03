import { getQuestion } from '@/service/question'

export default {
    getQuestion({commit}, payload) {
        return new Promise((resolve, reject) => {
            getQuestion(payload.page).then(res => {
                commit('getQuestion', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
}
