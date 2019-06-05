import { getRole, createRole, showRole, updateRole, destroyRole } from '@/service/role'

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
    createRole({commit}, payload) {
        return new Promise((resolve, reject) => {
            createRole(payload.role).then(res => {
                commit('createRole', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    showRole({commit}, payload) {
        return new Promise((resolve, reject) => {
            showRole(payload.role).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    updateRole({commit}, payload) {
        return new Promise((resolve, reject) => {
            updateRole(payload.role).then(res => {
                commit('updateRole', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    destroyRole({commit}, payload) {
        return new Promise((resolve, reject) => {
            destroyRole(payload.role).then(res => {
                commit('destroyRole', res)
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
}
