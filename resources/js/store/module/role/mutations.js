export default {
    getRole(state, payload) {
        state.roles = payload.data
        state.total = payload.meta ? payload.meta.total : 0
        state.last_page = payload.meta ? payload.meta.last_page : 0
    },

    createRole (state, payload) {
        state.roles.unshift(payload)
        state.total += 1
    },

    updateRole (state, payload) {
        state.roles = state.roles.map(role => {
            if (role.id == payload.id) {
                return payload
            }
            return role
        })
    },

    destroyRole (state, payload) {
        state.roles = state.roles.filter(role => {
            return role.id != payload.id
        })
        state.total -= 1
    }
}
