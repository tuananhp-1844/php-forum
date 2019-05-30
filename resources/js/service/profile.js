import { HTTP } from '@/base-axios'

export function getProfile () {
    return HTTP.get('profile')
}
