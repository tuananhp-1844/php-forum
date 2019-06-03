export default {
    getQuestion(state, payload) {
        state.questions = payload.data
        state.total = payload.meta ? payload.meta.total : 0
        state.last_page = payload.meta ? payload.meta.last_page : 0
    },

    destroyQuestion (state, payload) {
        state.questions = state.questions.filter(question => {
            return parseInt(question.id) !== parseInt(payload.id)
        })
    }
}
