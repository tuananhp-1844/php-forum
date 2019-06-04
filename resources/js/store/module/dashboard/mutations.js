export default {
    getDashboard (state, payload) {
        state.member_count = payload.member_count
        state.question_count = payload.question_count
        state.post_count = payload.post_count
        state.tag_count = payload.tag_count
    }
}
