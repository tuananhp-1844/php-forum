import { HTTP } from '@/base-axios'

export function getUser (page = 1) {
    return HTTP.get('users', {
        params: {
            page
        }
    })
}

export function activeUser (user_id) {
    return HTTP.delete('users/' + user_id)
}
