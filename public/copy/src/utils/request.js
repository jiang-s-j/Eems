import axios from 'axios'

export function request (config) {
  const service = axios.create({
    baseURL: 'http://127.0.0.1:8083/',
    timeout: 5000
  })
  // 请求拦截器
  service.interceptors.request.use(
    config => {
      return config
    },
    error => {
      return Promise.reject(error)
    }
  )
  // 响应拦截器
  service.interceptors.response.use(
    response => {
      if (response.status === 200) {
        return response.data
      }
    },
    error => {
      return Promise.reject(error)
    }
  )

  return service(config)
}
