<?php
namespace app\model;

use think\Model;

class userModel extends Model
{
    protected $table = 'eems_user';
    protected $connection = 'mysql';
    protected $pk = 'id';
}
