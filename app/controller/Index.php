<?php
namespace app\controller;
use app\BaseController;
use app\model\recruitmentModel;
use app\model\userModel;
use app\model\salaryModel;
use think\facade\Request;
class Index extends BaseController
{
    public function index()
    {
//        return 1;
        $data = Request::post();
        $user = userModel::where('email', '=', $data['username'])
            ->where('password', '=', $data['password'])
            ->findOrEmpty();
        if ($user->isEmpty()) {
            return ['code' => '-1'];
        } else {
            return ['code' => '1'];
        }
    }
  public function finduser()    // 定义 login
  {
    $finduser=userModel::select();
    if($finduser){
      return json($finduser);
    }
  }
  public function reg(){
    if(Request::isPost()){
      $d=strtotime("+0 Months");
      $data=Request::post();
      if ($data){
        $user= userModel::where('Id',$data['Id'])
            ->update([
                'nickname' => $data['nickname'],
                'addres' => $data['addres'],
                'add_time'=>$d
            ]);
        return $user ? 1: 0;
      }
    }else{
      return ['ecode'=>-2,'message'=>'请求类型错误'];
    }
  }
  public function xiugai(){
    if(Request::isPost()){
      $data=Request::post();
      if ($data){
        $user= userModel::where('email',$data['email'])
            ->update([
                'password' => $data['password'],
            ]);
        return $user ? 1: 0;
      }
    }else{
      return ['ecode'=>-2,'message'=>'修改错误'];
    }
  }
  public function qingjia(){
    if(Request::isPost()){
      $data=Request::post();
      if ($data['i']){
        $user= userModel::where('email',$data['email'])
            ->update([
                'leave' => '是',
            ]);
        return $user ? 1: 0;
      }else{
        $user= userModel::where('email',$data['email'])
            ->update([
                'leave' => '否',
            ]);
      }
    }else{
      return ['ecode'=>-2,'message'=>'修改错误'];
    }
  }
  public function san(){
    if(Request::isPost()){
      $data=Request::post();
      if ($data){
        $user= userModel::where('Id',$data['Id'])
            ->delete();
        return $user ? 1: 0;
      }
    }else{
      return ['ecode'=>-2,'message'=>'删除失败'];
    }
  }

    public function search()
    {
        $data = Request::get();
        $page = ($data['page'] - 1) * 10;
//        return $data;
        $recruitment = recruitmentModel::where('status', '=', $data['status'])
            ->where('location', '=', $data['location'])
            ->limit($page, '10')
            ->select();
        $count = recruitmentModel::select()
            ->count();
        return ['count' => $count, 'data' => $recruitment];
//        }else{
//            $recruitment = recruitmentModel::where('status','=',$data['status'][0])
//                ->limit(10)
//                ->select();
//            return $data;
//            return  $recruitment;
//        }

    }
  public function getSalary() {
    $user = Request::get();
    $salary = salaryModel::where('email','=',$user['email'])
        ->find();
    return  [$salary];
  }
}
