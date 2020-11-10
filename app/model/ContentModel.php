<?php
namespace app\model;
use think\Model;
use app\model\CateModel;
class ContentModel extends Model
{
    protected $table = "forum_content";
    protected $pk = "id";
    protected $schema =[
        'id' => 'int',
        'title' => 'string',
        'title_img' => 'string',
        'is_hot' => 'int',
        'is_top' => 'int',
        'cate_id' => 'int',
        'user_id' => 'int',
        'content' => 'string',
        'browse' => 'int',
        'status' => 'int',
        'create' => 'int',
        'update_time' => 'int'
    ];
    protected $autoWriteTimestamp;
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';
    public function getStatusAttr(int $name)
    {
        $status = [0=>'禁用',1=>'启用'];
        return $status[$name];

    }
    public function getIsHotAttr(int $name)
    {
        $status = [0=>'普通',1=>'热门'];
        return $status[$name];
    }
    public function getIsTopAttr(int $name)
    {
        $status =['0'=>'普通',1=>'置顶'];
        return $status[$name];
    }
}