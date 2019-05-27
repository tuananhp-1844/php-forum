import axios from 'axios';
import { getToken } from '@/helper/local-storage'

export const HTTP = axios.create({
  baseURL: process.env.MIX_APP_URL,
  headers: {
    Authorization: 'Bearer ' + getToken()
  }
})
