import { request } from '../utils/request'
export function fr () {
  return request({
    url: 'index/finduser',
    method: 'post'
  })
}
