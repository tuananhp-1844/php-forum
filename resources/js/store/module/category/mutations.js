export default {
    getCategory(state, payload) {
        state.categories = payload.data
        state.total = payload.meta ? payload.meta.total : 0
        state.last_page = payload.meta ? payload.meta.last_page : 0
    },
    createCategory (state, payload) {
        state.categories.unshift(payload)
        state.total += 1
    },
    destroyCategory (state, payload) {
        state.categories = state.categories.filter(category => {
            return category.id != payload.id
        })
        state.total -= 1
    },
    updateCategory (state, payload) {
        state.categories = state.categories.map(category => {
            if (category.id == payload.id) {
                return payload
            }
            return category
        })
    }
}
