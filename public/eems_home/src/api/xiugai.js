import { request } from '../utils/request'
export function xiugai (email, password) {
  return request({
    url: 'index/xiugai',
    method: 'post',
    data: {
      email: email,
      password: password
    }
  })
}
