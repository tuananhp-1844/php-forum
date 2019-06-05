import { HTTP } from '@/base-axios'

export function getRole(page = 1) {
    return HTTP.get('roles', {
        params: {
            page
        }
    })
}

export function createRole(role) {
    return HTTP.post('roles', role)
}

export function showRole(role) {
    return HTTP.get('roles/' + role.id)
}

export function updateRole(role) {
    return HTTP.put('roles/' + role.id, role)
}

export function destroyRole(role) {
    return HTTP.delete('roles/' + role.id)
}
