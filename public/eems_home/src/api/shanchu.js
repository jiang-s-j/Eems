import { request } from '../utils/request'
export function san ({ Id }) {
  return request({
    url: 'index/san',
    method: 'post',
    data: {
      Id: Id
    }
  })
}
