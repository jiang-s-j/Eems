import { request } from '../utils/request'

export function getLoginData (username, password) {
  return request({
    url: 'index/index',
    method: 'post',
    data: {
      username: username,
      password: password
    }
  })
}
