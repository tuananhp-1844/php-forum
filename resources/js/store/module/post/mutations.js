export default {
    getPost(state, payload) {
        state.posts = payload.data
        state.total = payload.meta ? payload.meta.total : 0
        state.last_page = payload.meta ? payload.meta.last_page : 0
    },

    changeStatus(state, payload) {
        state.posts = state.posts.map(post => {
            if (post.id === payload.id) {
                return payload
            }
            return post
        })
    }
}
