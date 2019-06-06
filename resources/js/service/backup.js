import { HTTP } from '@/base-axios'

export function getBackup(page = 1) {
    return HTTP.get('backup', {
        params: {
            page
        }
    })
}
export function showBackup(backup) {
    return HTTP.get('backup/' + backup.id)
}
export function createBackup () {
    return HTTP.post('backup')
}
