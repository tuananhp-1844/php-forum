import axios from 'axios';
import { getToken } from '@/helper/local-storage'

const api = axios.create({
    baseURL: process.env.MIX_APP_URL,
    transformRequest: [function (data, headers) {
        headers['Authorization'] = 'Bearer' + getToken()
        headers['Content-Type'] = 'application/json'
        if (data instanceof FormData) {
            return data
        }

        return JSON.stringify(data)
    }]
})
api.interceptors.response.use(function (response) {
    return response.data
}, function (error) {
    return Promise.reject(error.response)
})

export const HTTP = api
