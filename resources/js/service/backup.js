import { HTTP } from '@/base-axios'

export function getBackup(page = 1) {
    return HTTP.get('backup', {
        params: {
            page
        }
    })
}
