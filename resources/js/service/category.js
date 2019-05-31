import { HTTP } from '@/base-axios'

export function getCategory(page = 1) {
    return HTTP.get('categories', {
        params: {
            page
        }
    })
}
