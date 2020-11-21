<?php


namespace app\model;


use think\Model;

class salaryModel extends Model
{
    protected $pk = 'id';
    protected $connection = 'mysql';
    protected $table = 'eems_salary';
}
