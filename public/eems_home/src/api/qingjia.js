import { request } from '../utils/request'
export function qingjia (email, i) {
  return request({
    url: 'index/qingjia',
    method: 'post',
    data: {
      email: email,
      i: i
    }
  })
}
