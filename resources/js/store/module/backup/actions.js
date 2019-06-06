import { getBackup, showBackup, createBackup } from '@/service/backup'

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
    },

    showBackup({commit}, payload) {
        return new Promise((resolve, reject) => {
            showBackup(payload.backup).then(res => {
                resolve(res)
            }).catch(error => {
                reject(error)
            })
        })
    },

    createBackup({commit}, payload) {
        return new Promise((resolve, reject) => {
            createBackup().then(res => {
                commit('createBackup', res)
                resolve(res)
            }).catch(error => {
                reject(error)
            })
        })
    },
}
