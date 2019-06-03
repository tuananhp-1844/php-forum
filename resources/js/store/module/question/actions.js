import { getQuestion, destroyQuestion } from '@/service/question'

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
    destroyQuestion({commit}, payload) {
        return new Promise((resolve, reject) => {
            destroyQuestion(payload.question_id, payload.type).then(res => {
                commit('destroyQuestion', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
}
