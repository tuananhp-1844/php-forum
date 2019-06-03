import { HTTP } from '@/base-axios/index'

export function login(email, password) {
    return HTTP.post('login', {email, password})
}
export function logout() {
    return HTTP.post('logout')
}
