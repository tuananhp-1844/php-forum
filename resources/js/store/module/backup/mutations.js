export default {
    getBackup(state, payload) {
        state.items = payload.data
        state.total = payload.meta ? payload.meta.total : 0
        state.last_page = payload.meta ? payload.meta.last_page : 0
    },

    createBackup (state, payload) {
        state.items.unshift(payload)
        state.total += 1
    }
}
