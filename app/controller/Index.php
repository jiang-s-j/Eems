<?php
namespace app\controller;

use app\BaseController;
use app\model\recruitmentModel;
use app\model\userModel;
use think\facade\Request;

class Index extends BaseController
{
    public function index()
    {
       $data = Request::post();
       $user = userModel::where('email','=',$data['username'])
           ->where('password','=',$data['password'])
           ->findOrEmpty();
       if ($user->isEmpty()){
           return ['code'=>'-1'];
       }else {
           return ['code'=>'1'];
       }

    }

    public function search()
    {
        $data = Request::get();
        $page = ($data['page'] - 1) * 10;
//        return $data;
        $recruitment = recruitmentModel::where('status','=',$data['status'])
                ->where('location','=',$data['location'])
                ->limit($page,'10')
                ->select();
        $count = recruitmentModel::select()
            ->count();
        return ['count'=>$count,'data'=>$recruitment];
//        }else{
//            $recruitment = recruitmentModel::where('status','=',$data['status'][0])
//                ->limit(10)
//                ->select();
//            return $data;
//            return  $recruitment;
//        }

    }
}
