export default {
    getCategory(state, payload) {
        state.categories = payload.data
        state.total = payload.meta ? payload.meta.total : 0
        state.last_page = payload.meta ? payload.meta.last_page : 0
    }
}
