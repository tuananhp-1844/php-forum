export default {
    getRole(state, payload) {
        state.roles = payload.data
        state.total = payload.meta ? payload.meta.total : 0
        state.last_page = payload.meta ? payload.meta.last_page : 0
    }
}
