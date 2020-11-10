<?php
namespace app\validate;

use think\Validate;
class Content extends Validate
{
    protected $rule =[
        'title|标题' => 'require|length:3,25|chsAlphaNum',
        'title_img|标题图片' => 'filesize:1024000000|fileExt:jpeg,jpg,png',
        'content|文章内容' => 'require',
        'user_id|作者' => 'require',
        'cate_id|模板' => 'require'
    ];
}