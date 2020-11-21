import { request } from '../utils/request'

export const salary = (params) => {
  return request({
    method: 'get',
    url: 'index/getSalary',
    params
  })
}
