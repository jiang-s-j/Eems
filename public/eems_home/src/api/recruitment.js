import { request } from '../utils/request'

export const getRecruitment = (params) => {
  return request({
    url: 'index/search',
    method: 'get',
    params
  })
}
