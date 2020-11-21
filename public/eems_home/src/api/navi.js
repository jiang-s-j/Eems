import { request } from '../utils/request'
export function mima ({ Id, nickname, addres }) {
  return request({
    url: 'index/reg',
    method: 'post',
    data: {
      Id: Id,
      nickname: nickname,
      addres: addres
    }
  })
}
