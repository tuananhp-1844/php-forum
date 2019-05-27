import { HTTP } from '@/base-axios'

export function getUser (page = 1) {
    return HTTP.get('users', {
        params: {
            page
        }
    })
}
