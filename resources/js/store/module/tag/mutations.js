export default {
    getTag(state, payload) {
        state.tags = payload.data
        state.total = payload.meta ? payload.meta.total : 0
        state.last_page = payload.meta ? payload.meta.last_page : 0
    },
    createTag (state, payload) {
        state.tags.unshift(payload)
        state.total += 1
    },
    destroyTag (state, payload) {
        state.tags = state.tags.filter(tag => {
            return tag.id != payload.id
        })
        state.total -= 1
    },
    updateTag (state, payload) {
        state.tags = state.tags.map(Tag => {
            if (Tag.id == payload.id) {
                return payload
            }
            return Tag
        })
    }
}
