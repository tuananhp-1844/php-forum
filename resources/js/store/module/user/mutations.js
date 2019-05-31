export default {
    getUser(state, payload) {
        state.users = payload.data
    }
}
