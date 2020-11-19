<?php


namespace app\model;


use think\Model;

class recruitmentModel extends Model
{
    protected $table = 'eems_recruitment';
    protected $pk = 'id';
    protected $connection = 'mysql';
}
