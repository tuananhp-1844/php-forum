import { HTTP } from '@/base-axios'

export function getPost(page = 1) {
    return HTTP.get('posts', {
        params: {
            page
        }
    })
}

export function changeStatus(status, post_id) {
    return HTTP.post('posts/' + post_id + '/change-status', {
        status
    })
}
