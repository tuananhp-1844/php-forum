export default {
    getMember(state) {
        return state.member_count
    },
    getQuestion(state) {
        return state.question_count
    },
    getPost(state) {
        return state.post_count
    },
    getTag(state) {
        return state.tag_count
    }
}
