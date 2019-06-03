import { HTTP } from '@/base-axios'

export function getQuestion(page = 1) {
    return HTTP.get('questions', {
        params: {
            page
        }
    })
}

export function destroyQuestion (question_id, type) {
    return HTTP.delete('questions/' + question_id, {
        params: { type }
    })
}
