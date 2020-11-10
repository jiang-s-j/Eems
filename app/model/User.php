<?php


namespace app\model;

use think\Model;
class User extends Model
{
    protected $table="forum_user";
    protected $pk="uid";
    protected $connection="mysql";
    protected $schema = [
        'uid' => 'int',
        'nickname' => 'string',
        'status' => 'int',
        'password'=>'char',
        'account'=>'varchar',
    ];

    public function getStatusAttr(int $name)
    {
        $status = ['1' => '启用','0' => '禁用'];
        return $status[$name];
    }



}
