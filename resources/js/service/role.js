import { HTTP } from '@/base-axios'

export function getRole(page = 1) {
    return HTTP.get('roles', {
        params: {
            page
        }
    })
}
