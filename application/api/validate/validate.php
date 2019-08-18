<?php


namespace app\api\validate;


class validate extends \think\Validate
{
    protected $rule =[
        'id' => 'require|ispost'
    ]
}