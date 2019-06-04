import { HTTP } from '@/base-axios'

export function getDashboard(page = 1) {
    return HTTP.get('dashboard')
}
