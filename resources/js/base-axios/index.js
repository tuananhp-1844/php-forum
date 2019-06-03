import axios from 'axios';
import { getToken, clearLocalStorage } from '@/helper/local-storage'
import router from '@/router'

const api = axios.create({
    baseURL: process.env.MIX_APP_URL,
    transformRequest: [function (data, headers) {
        headers['Authorization'] = 'Bearer' + getToken()
        headers['Content-Type'] = 'application/json'
        headers['X-Requested-With'] = 'XMLHttpRequest'
        if (data instanceof FormData) {
            return data
        }

        return JSON.stringify(data)
    }]
})
api.interceptors.response.use(function (response) {
    return response.data
}, function (error) {
    if (error.status === 401) {
        clearLocalStorage()
        router.push('/login')
    }
    return Promise.reject(error.response)
})

export const HTTP = api
