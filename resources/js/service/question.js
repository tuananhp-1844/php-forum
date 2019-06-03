import { HTTP } from '@/base-axios'

export function getQuestion(page = 1) {
    return HTTP.get('questions', {
        params: {
            page
        }
    })
}
